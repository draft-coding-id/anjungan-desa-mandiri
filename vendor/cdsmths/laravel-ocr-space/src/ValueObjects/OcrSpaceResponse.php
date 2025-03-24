<?php

namespace Codesmiths\LaravelOcrSpace\ValueObjects;

use Illuminate\Support\Collection;

class OcrSpaceResponse
{
    /**
     * @param  Collection<int, ParsedResult>  $parsedResults  The parsed results
     * @param  int  $OCRExitCode  The OCR exit code
     * @param  bool  $isErroredOnProcessing  Whether the processing was errored
     * @param  array<int, string>|null  $errorMessages  The error message
     * @param  string|null  $errorDetails  The error details
     * @param  int  $processingTimeInMilliseconds  The processing time in milliseconds
     */
    public function __construct(
        private readonly Collection $parsedResults,
        private readonly int $OCRExitCode,
        private readonly bool $isErroredOnProcessing,
        private readonly ?array $errorMessages,
        private readonly ?string $errorDetails,
        private readonly int $processingTimeInMilliseconds,
        private readonly ?string $searchablePdfUrl
    ) {}

    /**
     * @param array{
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
    public static function fromResponse(array $data): self
    {
        $parsedResults = collect($data['ParsedResults'])
            ->map(fn (mixed $parsedResult): ParsedResult => ParsedResult::fromResponse($parsedResult));

        return new self(
            $parsedResults,
            $data['OCRExitCode'] ? (int) $data['OCRExitCode'] : 0,
            $data['IsErroredOnProcessing'] ?? false,
            $data['ErrorMessage'] ?? null,
            $data['ErrorDetails'] ?? null,
            $data['ProcessingTimeInMilliseconds'] ? (int) $data['ProcessingTimeInMilliseconds'] : 0,
            $data['SearchablePDFURL'] ?? null,
        );
    }

    /**
     * @return Collection<int, ParsedResult> $parsedResults The parsed results
     */
    public function getParsedResults(): Collection
    {
        return $this->parsedResults;
    }

    public function getOCRExitCode(): int
    {
        return $this->OCRExitCode;
    }

    public function getIsErroredOnProcessing(): bool
    {
        return $this->isErroredOnProcessing;
    }

    /**
     * @return array<int, string>|null The error messages
     */
    public function getErrorMessages(): ?array
    {
        return $this->errorMessages;
    }

    public function getErrorDetails(): ?string
    {
        return $this->errorDetails;
    }

    public function getProcessingTimeInMilliseconds(): int
    {
        return $this->processingTimeInMilliseconds;
    }

    public function getSearchablePdfUrl(): ?string
    {
        return $this->searchablePdfUrl;
    }

    public function hasSearchablePdfUrl(): bool
    {
        return $this->searchablePdfUrl !== null;
    }

    public function hasError(): bool
    {
        return $this->isErroredOnProcessing;
    }

    public function hasParsedResults(): bool
    {
        return $this->parsedResults->isNotEmpty();
    }
}
