<?php

namespace Codesmiths\LaravelOcrSpace\ValueObjects;

use Illuminate\Support\Collection;

class TextOverlay
{
    /**
     * @param  Collection<int, Line>  $lines  The lines
     */
    public function __construct(
        private readonly Collection $lines,
        private readonly bool $hasOverlay,
        private readonly ?string $message,
    ) {}

    /**
     * @return Collection<int, Line>
     */
    public function getLines(): Collection
    {
        return $this->lines;
    }

    public function hasOverlay(): bool
    {
        return $this->hasOverlay;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
