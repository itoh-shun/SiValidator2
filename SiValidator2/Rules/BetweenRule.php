<?php

namespace SiLibrary\SiValidator2\Rules;

class BetweenRule implements RuleInterface
{
    private $min;
    private $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public static function processable($value): bool
    {
        return is_string($value) || is_numeric($value) || is_array($value); // We assume files are handled separately
    }

    public function validate($value, array $allValues = []): bool
    {
        if (is_string($value)) {
            $length = strlen($value);
            return $length >= $this->min && $length <= $this->max;
        }

        if (is_numeric($value)) {
            return $value >= $this->min && $value <= $this->max;
        }

        if (is_array($value)) {
            $count = count($value);
            return $count >= $this->min && $count <= $this->max;
        }

        return false; // Default case, shouldn't be reached
    }

    public function message(): string
    {
        return "The value must be between {$this->min} and {$this->max}.";
    }

    public function name(): string
    {
        return 'between';
    }
}
