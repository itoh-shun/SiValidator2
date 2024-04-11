<?php

namespace SiLibrary\SiValidator2\Rules;

class IntegerRule implements RuleInterface
{
    public static function processable($value, $field = null): bool
    {
        return true;
    }

    public function validate($value, $allValues = []): bool
    {
        return ctype_digit(strval($value));
    }

    public function message(): string
    {
        return 'The :attribute must be an integer.';
    }

    public function name(): string
    {
        return 'integer';
    }
}
