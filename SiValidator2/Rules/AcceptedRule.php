<?php

namespace SiLibrary\SiValidator2\Rules;

class AcceptedRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return true;  // All types of values can be processed by this rule
    }

    public function validate($value, array $allValues = []): bool
    {
        $acceptedValues = ["yes", "on", 1, true];
        return in_array($value, $acceptedValues, true);
    }

    public function message(): string
    {
        return "The field must be accepted.";
    }

    public function name(): string
    {
        return "accepted";
    }
}
