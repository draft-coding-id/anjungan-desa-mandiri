<?php

declare(strict_types=1);

namespace Codesmiths\LaravelOcrSpace;

use Codesmiths\LaravelOcrSpace\Enums\InputType;
use Codesmiths\LaravelOcrSpace\Exceptions\InvalidRequestException;
use Codesmiths\LaravelOcrSpace\Exceptions\MissingOcrSpaceOptionException;
use Codesmiths\LaravelOcrSpace\ValueObjects\OcrSpaceResponse;
use Illuminate\Support\Facades\Http;

class OcrSpace
{
    public function parseImage(
        InputType $inputType,
        string $filePath,
        OcrSpaceOptions $options
    ): OcrSpaceResponse {

        /**
         * @var int $timeout The request timeout
         */
        $timeout = config('ocr-space.timeout');

        /**
         * @var string $url The request URL
         */
        $url = config('ocr-space.api_url');

        $client = Http::asMultipart();
        $client->timeout($timeout);
        $client->withHeaders([
            'apikey' => config('ocr-space.api_key'),
        ]);

        $mimeType = $options->fileType ?? false;

        $data = [
            ...$this->parseImageData($inputType, $filePath, $mimeType),
            ...$options->toArray(),
        ];

        $response = $client->post($url, $data);

        /**
         * @var array{
         *      ParsedResults: array<int, array{
         *          TextOverlay: array{
         *              Lines: array<int, array{
         *                  Words: array<int, array{
         *                      WordText: string,
         *                      Left: int,
         *                      Top: int,
         *                      Height: int,
         *                      Width: int
         *                  }>,
         *                  MaxHeight: int,
         *                  MinTop: int,
         *              }>,
         *              HasOverlay: bool,
         *              Message: string,
         *          },
         *          FileParseExitCode: string,
         *          ParsedText: string,
         *          ErrorMessage: string|null,
         *          ErrorDetails: string|null,
         *      }>,
         *      OCRExitCode: int|null,
         *      IsErroredOnProcessing: bool|null,
         *      ErrorMessage: array<int, string>|null,
         *      ErrorDetails: string|null,
         *      ProcessingTimeInMilliseconds: int|null,
         *      SearchablePDFURL: string|null
         * } $data The response data
         */
        $data = $response->json();

        if ($data['IsErroredOnProcessing']) {
            if (is_array($data['ErrorMessage'])) {
                throw new InvalidRequestException($data['ErrorMessage'][0]);
            }

            throw new InvalidRequestException('An error occurred while processing the image.');
        }

        $result = OcrSpaceResponse::fromResponse($data);

        if ($result->hasError()) {
            throw new InvalidRequestException((string) $result->getErrorDetails());
        }

        return $result;
    }

    /**
     * @param  InputType  $inputType  The parsing type
     * @param  string  $filePath  The file path
     * @return array<int, array<string, bool|resource|string>> The parsed image data
     */
    protected function parseImageData(InputType $inputType, string $filePath, string|false $mimeType): array
    {
        return match ($inputType) {
            InputType::Binary => [
                [
                    'name' => 'base64image',
                    'contents' => $this->covertBinaryImageToBase64($filePath),
                ],
                [
                    'name' => 'fileType',
                    'contents' => $mimeType,
                ],
            ],
            InputType::Base64 => [
                [
                    'name' => 'base64image',
                    'contents' => $filePath,
                ],
                [
                    'name' => 'fileType',
                    'contents' => $mimeType,
                ],
            ],
            InputType::File => [
                [
                    'name' => 'file',
                    'contents' => fopen($filePath, 'r'),
                ],
                [
                    'name' => 'filetype',
                    'contents' => $mimeType,
                ],
            ],
            InputType::Url => [
                [
                    'name' => 'url',
                    'contents' => $filePath,
                ],
            ]
        };
    }

    private function covertBinaryImageToBase64(string $image): string
    {
        return base64_encode($image);
    }

    public function parseImageFile(string $filePath, OcrSpaceOptions $options): OcrSpaceResponse
    {
        return $this->parseImage(InputType::File, $filePath, $options);
    }

    public function parseBinaryImage(string $binary, OcrSpaceOptions $options): OcrSpaceResponse
    {
        if ($options->fileType === null) {
            throw MissingOcrSpaceOptionException::forProperty('fileType', 'when parsing binary images');
        }

        return $this->parseBase64Image(base64_encode($binary), $options);
    }

    public function parseBase64Image(string $base64, OcrSpaceOptions $options): OcrSpaceResponse
    {
        if ($options->fileType === null) {
            throw MissingOcrSpaceOptionException::forProperty('fileType', 'when parsing base64 images');
        }

        return $this->parseImage(InputType::Base64, 'data:'.$options->fileType.';base64,'.$base64, $options);
    }

    public function parseImageUrl(string $url, OcrSpaceOptions $options): OcrSpaceResponse
    {
        return $this->parseImage(InputType::Url, $url, $options);
    }
}
