<?php

namespace SiLibrary\SiValidator2\Rules;

// Date Rule
class DateRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        // アルファベットを含む場合はエラー
        if (preg_match('/[a-zA-Z]/', $value)) {
            return false;
        }

        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return "The field must be a valid date.";
    }

    public function name(): string
    {
        return 'date';
    }
}
