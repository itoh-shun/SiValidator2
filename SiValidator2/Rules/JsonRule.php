<?php

namespace SiLibrary\SiValidator2\Rules;

class JsonRule implements RuleInterface
{
    public static function processable($value, $field = null): bool
    {
        return is_string($value);
    }

    public function validate($value, $allValues = []): bool
    {
        json_decode($value);
        return json_last_error() == JSON_ERROR_NONE;
    }

    public function message(): string
    {
        return 'The :attribute must be a valid JSON string.';
    }

    public function name(): string
    {
        return 'json';
    }
}
