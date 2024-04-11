<?php

namespace SiLibrary\SiValidator2\Rules;

class DigitsBetweenRule implements RuleInterface
{
    protected $min;
    protected $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public static function processable($value): bool
    {
        return is_numeric($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        $length = strlen((string) $value);
        return $length >= $this->min && $length <= $this->max;
    }

    public function message(): string
    {
        return "The field must be between :min and :max digits.";
    }

    public function name(): string
    {
        return 'digits_between';
    }
}
