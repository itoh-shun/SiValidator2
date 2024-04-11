<?php

namespace SiLibrary\SiValidator2\Rules;

class EmailRule implements RuleInterface
{
    /**
     * Check if the given value is a valid email.
     *
     * @param mixed $value
     * @return bool
     */
    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        // Check if the value is a valid email format using regex.
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function message(): string
    {
        return ":attribute は有効なEメールアドレスではありません。";
    }

    public function name(): string
    {
        return 'email';
    }
}
