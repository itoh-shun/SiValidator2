<?php

namespace SiLibrary\SiValidator2\Rules;

class MaxRule implements RuleInterface
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public static function processable($value, $field = null): bool
    {
        return is_numeric($value) || is_string($value) || is_array($value);
    }

    public function validate($value, $allValues = []): bool
    {
        if (is_numeric($value)) {
            return $value <= $this->max;
        }
        if (is_string($value)) {
            return mb_strlen($value) <= $this->max;
        }
        if (is_array($value)) {
            return count($value) <= $this->max;
        }
        return false;
    }

    public function message(): string
    {
        return 'The :attribute may not be greater than :max.';
    }

    public function name(): string
    {
        return 'max';
    }
}
