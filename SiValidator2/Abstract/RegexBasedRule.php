<?php

namespace SiLibrary\SiValidator2\Rules;

abstract class RegexBasedRule implements RuleInterface
{
    public function validate($value, array $allValues = []): bool
    {
        if (!is_string($value)) {
            return false;
        }
        return preg_match($this->pattern(), $value) > 0;
    }

    abstract protected function pattern(): string;
    public static function processable($value): bool
    {
        return true;
    }
}
