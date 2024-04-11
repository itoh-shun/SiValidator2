<?php

namespace SiLibrary\SiValidator2\Rules;

class ActiveUrlRule implements RuleInterface
{
    public function validate($value, array $allValues = []): bool
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        // Check if the domain is active
        $host = parse_url($value, PHP_URL_HOST);
        if ($host !== null && checkdnsrr($host, 'A')) {
            return true;
        }

        return false;
    }

    public function message(): string
    {
        return 'The :attribute is not a valid active URL.';
    }

    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function name(): string
    {
        return 'active_url';
    }
}
