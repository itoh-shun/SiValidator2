<?php

namespace SiLibrary\SiValidator2\Rules;

class ExcludeUnlessRule implements RuleInterface
{
    protected $otherField;
    protected $expectedValue;

    public function __construct($otherField, $expectedValue)
    {
        $this->otherField = $otherField;
        $this->expectedValue = $expectedValue;
    }

    public static function processable($value): bool
    {
        return true;  // Always process this rule
    }

    public function validate($value, array $allValues = []): bool
    {
        return $allValues[$this->otherField] === $this->expectedValue;
    }

    public function message(): string
    {
        // This rule won't produce an error message since it just excludes the field
        return "";
    }

    public function name(): string
    {
        return 'exclude_unless';
    }
}
