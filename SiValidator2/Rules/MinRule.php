<?php

namespace SiLibrary\SiValidator2\Rules;

class MinRule implements RuleInterface
{
    protected $min;

    public function __construct($min)
    {
        $this->min = $min;
    }

    public static function processable($value, $field = null): bool
    {
        return is_numeric($value) || is_string($value) || is_array($value);
    }

    public function validate($value, $allValues = []): bool
    {
        if (is_numeric($value)) {
            return $value >= $this->min;
        }
        if (is_string($value)) {
            return mb_strlen($value) >= $this->min;
        }
        if (is_array($value)) {
            return count($value) >= $this->min;
        }
        return false;
    }

    public function message(): string
    {
        return 'The :attribute must be at least :min.';
    }

    public function name(): string
    {
        return 'min';
    }
}
