<?php

namespace SiLibrary\SiValidator2\Rules;

class ArrayRule implements RuleInterface
{
    private $allowed_values = [];

    public function __construct(array $allowed_values)
    {
        $this->allowed_values = $allowed_values;
    }

    public static function processable($value): bool
    {
        return is_scalar($value) || is_null($value);
    }

    public function validate($value, $allValues = []): bool
    {
        return in_array($value, $this->allowed_values, true);
    }

    public function message(): string
    {
        return "The given value is not allowed.";
    }

    public function name(): string
    {
        return "array_rule";
    }
}
