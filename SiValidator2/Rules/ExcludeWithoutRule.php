<?php

namespace SiLibrary\SiValidator2\Rules;

class ExcludeWithoutRule implements RuleInterface
{
    protected $otherField;

    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public static function processable($value): bool
    {
        return true;  // Always process this rule
    }

    public function validate($value, array $allValues = []): bool
    {
        return isset($allValues[$this->otherField]);
    }

    public function message(): string
    {
        // This rule won't produce an error message since it just excludes the field
        return "";
    }

    public function name(): string
    {
        return 'exclude_without';
    }
}
