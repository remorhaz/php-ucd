<?php

declare(strict_types=1);

namespace Remorhaz\UCD\Exception;

use RuntimeException;
use Throwable;

final class PropertyFileNotLoadedException extends RuntimeException implements ExceptionInterface
{

    /**
     * @var string
     */
    private $propertyName;

    /**
     * @var string
     */
    private $propertyFile;

    /**
     * @var string|null
     */
    private $errorMessage;

    public function __construct(
        string $propertyName,
        string $propertyFile,
        ?string $errorMessage,
        Throwable $previous = null
    ) {
        $this->propertyName = $propertyName;
        $this->propertyFile = $propertyFile;
        $this->errorMessage = $errorMessage;
        parent::__construct($this->buildMessage(), 0, $previous);
    }

    private function buildMessage(): string
    {
        $message =
            "Failed to load range set for Unicode property '{$this->propertyName}' " .
            "from file {$this->propertyFile}";

        return isset($this->errorMessage)
            ? "{$message}:\n{$this->errorMessage}"
            : $message;
    }

    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    public function getPropertyFile(): string
    {
        return $this->propertyFile;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
