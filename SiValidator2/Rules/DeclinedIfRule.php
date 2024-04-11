<?php

namespace SiLibrary\SiValidator2\Rules;

class DeclinedIfRule implements RuleInterface
{
    protected $otherField;
    protected $expectedValues;
    protected const DECLINED_VALUES = ["no", "off", 0, "0", false, "false"];

    public function __construct($otherField, ...$expectedValues)
    {
        $this->otherField = $otherField;
        $this->expectedValues = $expectedValues;
    }

    public static function processable($value): bool
    {
        return true;
    }

    public function validate($value, array $allValues = []): bool
    {
        if (in_array($allValues[$this->otherField], $this->expectedValues, true)) {
            return in_array($value, self::DECLINED_VALUES, true);
        }
        return true;
    }

    public function message(): string
    {
        return "The field must be declined (no, off, 0, false) when :other is one of the specified values.";
    }

    public function name(): string
    {
        return 'declined_if';
    }
}
