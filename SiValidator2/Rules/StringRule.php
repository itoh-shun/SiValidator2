<?php

namespace SiLibrary\SiValidator2\Rules;

class StringRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return is_string($value) || is_null($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        return is_string($value);
    }

    public function message(): string
    {
        return "The :attribute must be a string.";
    }

    public function name(): string
    {
        return 'string';
    }
}
