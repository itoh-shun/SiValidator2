<?php

namespace SiLibrary\SiValidator2\Rules;

class RequiredRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return true;  // All types of values can be processed by this rule
    }

    public function validate($value, array $allValues = []): bool
    {
        if (is_null($value)) {
            return false;
        }

        if (is_string($value) && trim($value) === "") {
            return false;
        }

        if (is_array($value) && empty($value)) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return "The field is required.";
    }

    public function name(): string
    {
        return "required";
    }
}
