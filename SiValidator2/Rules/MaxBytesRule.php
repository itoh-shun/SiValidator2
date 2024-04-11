<?php

namespace SiLibrary\SiValidator2\Rules;

class MaxBytesRule implements RuleInterface
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public static function processable($value, $field = null): bool
    {
        return is_string($value);
    }

    public function validate($value, $allValues = []): bool
    {
        return $this->getAdjustedByteLength($value) <= $this->max;
    }

    public function message(): string
    {
        return 'The :attribute may not be greater than :value bytes.';
    }

    public function name(): string
    {
        return 'max_bytes';
    }

    protected function getAdjustedByteLength($str)
    {
        $length = 0;
        for ($i = 0; $i < mb_strlen($str, 'UTF-8'); $i++) {
            $char = mb_substr($str, $i, 1, 'UTF-8');
            if (strlen($char) > 1) {
                $length += 2;
            } else {
                $length += 1;
            }
        }
        return $length;
    }
}
