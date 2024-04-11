<?php

namespace SiLibrary\SiValidator2\Rules;

class DeclinedRule implements RuleInterface
{
    protected const DECLINED_VALUES = ["no", "off", 0, "0", false, "false"];

    public static function processable($value): bool
    {
        return true;
    }

    public function validate($value, array $allValues = []): bool
    {
        return in_array($value, self::DECLINED_VALUES, true);
    }

    public function message(): string
    {
        return "The field must be declined (no, off, 0, false).";
    }

    public function name(): string
    {
        return 'declined';
    }
}
