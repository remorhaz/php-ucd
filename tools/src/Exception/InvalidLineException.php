<?php

declare(strict_types=1);

namespace Remorhaz\UCD\Tool\Exception;

use RuntimeException;
use Throwable;

final class InvalidLineException extends RuntimeException implements ExceptionInterface
{
    public function __construct(
        private readonly string $lineText,
        ?Throwable $previous = null,
    ) {
        parent::__construct("Invalid line format: $this->lineText", previous: $previous);
    }

    public function getLineText(): string
    {
        return $this->lineText;
    }
}
