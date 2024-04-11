<?php

namespace SiLibrary\SiValidator2\Rules;

class BooleanRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return true;
    }

    public function validate($value, array $allValues = []): bool
    {
        $acceptedValues = [true, false, 1, 0, "1", "0"];
        return in_array($value, $acceptedValues, true);
    }

    public function message(): string
    {
        return "The value must be a valid boolean.";
    }

    public function name(): string
    {
        return 'boolean';
    }
}
