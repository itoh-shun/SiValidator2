<?php

namespace SiLibrary\SiValidator2\Rules;

class TimezoneRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        return in_array($value, timezone_identifiers_list(), true);
    }

    public function message(): string
    {
        return "The :attribute must be a valid timezone.";
    }

    public function name(): string
    {
        return 'timezone';
    }
}
