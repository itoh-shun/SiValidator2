<?php

namespace SiLibrary\SiValidator2\Rules;

class DigitsRule implements RuleInterface
{
    protected $digits;

    public function __construct($digits)
    {
        $this->digits = (int) $digits;
    }

    public static function processable($value): bool
    {
        return is_numeric($value) && is_integer($value + 0);
    }

    public function validate($value, array $allValues = []): bool
    {
        return strlen((string) $value) === $this->digits;
    }

    public function message(): string
    {
        return "The field must be a number and have exactly :digits digits.";
    }

    public function name(): string
    {
        return 'digits';
    }
}
