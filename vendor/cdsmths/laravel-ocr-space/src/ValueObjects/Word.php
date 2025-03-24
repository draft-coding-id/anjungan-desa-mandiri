<?php

namespace Codesmiths\LaravelOcrSpace\ValueObjects;

class Word
{
    public function __construct(
        private readonly string $wordText,
        private readonly int $left,
        private readonly int $top,
        private readonly int $height,
        private readonly int $width,
    ) {}

    /**
     * @param  array{
     *   WordText: string,
     *   Left: int,
     *   Top: int,
     *   Height: int,
     *   Width: int
     * } $data  The response data
     */
    public static function fromResponse(array $data): self
    {
        return new self(
            $data['WordText'],
            $data['Left'],
            $data['Top'],
            $data['Height'],
            $data['Width'],
        );
    }

    public function getWordText(): string
    {
        return $this->wordText;
    }

    public function getLeft(): int
    {
        return $this->left;
    }

    public function getTop(): int
    {
        return $this->top;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }
}
