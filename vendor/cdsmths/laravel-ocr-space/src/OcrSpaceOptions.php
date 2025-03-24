<?php

declare(strict_types=1);

namespace Codesmiths\LaravelOcrSpace;

use Codesmiths\LaravelOcrSpace\Enums\Language;
use Codesmiths\LaravelOcrSpace\Enums\OcrSpaceEngine;

class OcrSpaceOptions
{
    public function __construct(
        public ?bool $overlayRequired = null,
        public ?string $fileType = null,
        public ?bool $isTable = null,
        public ?OcrSpaceEngine $OCREngine = null,
        public ?bool $scale = null,
        public ?bool $isSearchablePdfHideTextLayer = null,
        public ?bool $isCreateSearchablePdf = null,
        public ?bool $detectOrientation = null,
        public ?Language $language = null,
    ) {}

    public static function make(): self
    {
        return new self;
    }

    /**
     * Transform the options to an array.
     *
     * @return array<int, mixed>
     */
    public function toArray(): array
    {
        $data = collect([
            'language' => $this->language?->value,
            'isOverlayRequired' => $this->overlayRequired === true ? 'true' : 'false',
            'filetype' => $this->fileType,
            'detectOrientation' => $this->detectOrientation === true ? 'true' : 'false',
            'isCreateSearchablePdf' => $this->isCreateSearchablePdf === true ? 'true' : 'false',
            'isSearchablePdfHideTextLayer' => $this->isSearchablePdfHideTextLayer === true ? 'true' : 'false',
            'scale' => $this->scale === true ? 'true' : 'false',
            'isTable' => $this->isTable === true ? 'true' : 'false',
            'OCREngine' => $this->OCREngine?->value,
        ])->filter(
            fn ($value): bool => $value !== null
        );

        $data = $data->map(
            fn ($value, $key): array => ['name' => $key, 'contents' => $value]
        )->values();

        return $data->toArray();
    }

    public function language(Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function overlayRequired(bool $overlayRequired = true): self
    {
        $this->overlayRequired = $overlayRequired;

        return $this;
    }

    public function fileType(string $fileType): self
    {
        $this->fileType = $fileType;

        return $this;
    }

    public function detectOrientation(bool $detectOrientation = true): self
    {
        $this->detectOrientation = $detectOrientation;

        return $this;
    }

    public function isCreateSearchablePdf(bool $isCreateSearchablePdf = true): self
    {
        $this->isCreateSearchablePdf = $isCreateSearchablePdf;

        return $this;
    }

    public function isTable(bool $isTable = true): self
    {
        $this->isTable = $isTable;

        return $this;
    }

    public function ocrEngine(OcrSpaceEngine $OCREngine): self
    {
        $this->OCREngine = $OCREngine;

        return $this;
    }

    public function scale(bool $scale = true): self
    {
        $this->scale = $scale;

        return $this;
    }

    public function isSearchablePdfHideTextLayer(bool $isSearchablePdfHideTextLayer = true): self
    {
        $this->isSearchablePdfHideTextLayer = $isSearchablePdfHideTextLayer;

        return $this;
    }
}
