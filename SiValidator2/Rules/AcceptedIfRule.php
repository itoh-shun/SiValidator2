<?php

namespace SiLibrary\SiValidator2\Rules;

class AcceptedIfRule implements RuleInterface
{
    private $otherField;
    private $expectedValue;

    public function __construct(string $otherField, $expectedValue)
    {
        $this->otherField = $otherField;
        $this->expectedValue = $expectedValue;
    }

    public static function processable($value): bool
    {
        return true;  // All types of values can be processed by this rule
    }

    public function validate($value, array $allValues = []): bool
    {
        $acceptedValues = ["yes", "on", 1, true];

        if (isset($allValues[$this->otherField]) && $allValues[$this->otherField] == $this->expectedValue) {
            return in_array($value, $acceptedValues, true);
        }

        // If the other field's value doesn't match the expected value, the attribute is not bound by this rule
        return !(in_array($value, $acceptedValues, true));
    }

    public function message(): string
    {
        return "The field must be accepted when :other is :value.";
    }

    public function name(): string
    {
        return "accepted_if";
    }
}
