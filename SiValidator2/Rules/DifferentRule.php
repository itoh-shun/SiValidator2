<?php

namespace SiLibrary\SiValidator2\Rules;

class DifferentRule implements RuleInterface
{
    protected $otherField;

    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public static function processable($value): bool
    {
        return true;
    }

    public function validate($value, array $allValues = []): bool
    {
        return $value !== $allValues[$this->otherField];
    }

    public function message(): string
    {
        return "The field must be different from :other.";
    }

    public function name(): string
    {
        return 'different';
    }
}
