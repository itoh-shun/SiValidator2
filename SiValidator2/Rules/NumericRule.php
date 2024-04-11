<?php

namespace SiLibrary\SiValidator2\Rules;

class NumericRule implements RuleInterface
{
    public static function processable($value, $field = null): bool
    {
        return true;
    }

    public function validate($value, $allValues = []): bool
    {
        return is_numeric($value);
    }

    public function message(): string
    {
        return 'The :attribute must be a number.';
    }

    public function name(): string
    {
        return 'numeric';
    }
}
