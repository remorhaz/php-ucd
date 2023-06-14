<?php

declare(strict_types=1);

namespace Remorhaz\UCD\Tool\Exception;

use LogicException;
use Throwable;

final class RangeSetAlreadyExistsException extends LogicException implements ExceptionInterface
{
    public function __construct(
        private string $propertyName,
        ?Throwable $previous = null,
    ) {
        parent::__construct("Property '$this->propertyName' already exists", 0, $previous);
    }
}
