<?php

namespace SiLibrary\SiValidator2\Rules;

class DistinctRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return is_array($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        return count($value) === count(array_unique($value, SORT_REGULAR));
    }

    public function message(): string
    {
        return ":attributeの中の値はすべて異なる必要があります。";
    }

    public function name(): string
    {
        return 'distinct';
    }
}
