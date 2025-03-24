<?php

namespace Codesmiths\LaravelOcrSpace\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codesmiths\LaravelOcrSpace\OcrSpace
 */
class OcrSpace extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Codesmiths\LaravelOcrSpace\OcrSpace::class;
    }
}
