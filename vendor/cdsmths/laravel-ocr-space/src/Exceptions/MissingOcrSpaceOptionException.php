<?php

declare(strict_types=1);

namespace Codesmiths\LaravelOcrSpace\Exceptions;

use InvalidArgumentException;

class MissingOcrSpaceOptionException extends InvalidArgumentException
{
    public static function forProperty(string $property, string $purpose, int $code = 0, ?\Throwable $previous = null): self
    {
        $message = "The [$property] property is required in the OcrSpaceOptions $purpose.";

        return new self($message, $code, $previous);
    }
}
