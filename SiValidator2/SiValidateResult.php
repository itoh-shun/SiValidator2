<?php

namespace SiLibrary\SiValidator2;

use ArrayAccess;

class SiValidateResult implements ArrayAccess
{
    private $value;
    private $isValid;
    private $message;
    private $field;

    private $container;

    public function __construct(string $field, $value, bool $isValid, ?string $message = null)
    {
        $this->field = $field;
        $this->value = $value;
        $this->isValid = $isValid;
        $this->message = $message;
        $this->container = $this->toArray();
    }

    public function value()
    {
        return $this->value;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function message(): ?string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'field' => $this->getField(),
            'value' => $this->value(),
            'isValid' => $this->isValid(),
            'message' => $this->message()
        ];
    }
    public function getField(): string
    {
        return $this->field;
    }
    
    public function offsetSet($offset, $value): void {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset): mixed {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}
