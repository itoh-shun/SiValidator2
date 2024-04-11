<?php

namespace SiLibrary\SiValidator2\Rules;

class AfterOrEqualDateRule extends DateComparisonRule
{
    protected function compareDates($valueDate, $refDate): bool
    {
        return $valueDate >= $refDate;
    }

    public function message(): string
    {
        return "The date must be after or equal to {$this->referenceDateOrField}.";
    }

    public function name(): string
    {
        return 'after_or_equal';
    }
}
