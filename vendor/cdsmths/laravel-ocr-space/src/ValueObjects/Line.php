<?php

namespace Codesmiths\LaravelOcrSpace\ValueObjects;

use Illuminate\Support\Collection;

class Line
{
    /**
     * @param  Collection<int, Word>  $words  The words
     * @param  int  $maxHeight  The max height
     * @param  int  $minTop  The min top
     */
    public function __construct(
        private readonly Collection $words,
        private readonly int $maxHeight,
        private readonly int $minTop,
    ) {}

    /**
     * @param array{
     *      Words: array<int, array{
     *          WordText: string,
     *          Left: int,
     *          Top: int,
     *          Height: int,
     *          Width: int
     *      }>,
     *      MaxHeight: int,
     *      MinTop: int,
     * } $data The response data
     */
    public static function fromResponse(array $data): self
    {
        $words = collect($data['Words'])
            ->map(fn (array $word): Word => Word::fromResponse($word));

        return new self(
            $words,
            $data['MaxHeight'],
            $data['MinTop']
        );
    }

    /**
     * @return Collection<int, Word>
     */
    public function getWords(): Collection
    {
        return $this->words;
    }

    public function getMaxHeight(): int
    {
        return $this->maxHeight;
    }

    public function getMinTop(): int
    {
        return $this->minTop;
    }
}
