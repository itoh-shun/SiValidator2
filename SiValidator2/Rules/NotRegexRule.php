<?php

namespace SiLibrary\SiValidator2\Rules;

class NotRegexRule implements RuleInterface
{
    protected $pattern;

    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    public static function processable($value, $field = null): bool
    {
        return is_string($value);
    }

    public function validate($value, $allValues = []): bool
    {
        return preg_match($this->pattern, $value) === 0;
    }

    public function message(): string
    {
        return 'The :attribute format is not allowed.';
    }

    public function name(): string
    {
        return 'not_regex';
    }
}
