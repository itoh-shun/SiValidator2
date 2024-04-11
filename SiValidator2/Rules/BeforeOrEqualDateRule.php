<?php

namespace SiLibrary\SiValidator2\Rules;

class BeforeOrEqualDateRule extends DateComparisonRule
{
    protected function compareDates($valueDate, $refDate): bool
    {
        return $valueDate <= $refDate;
    }

    public function message(): string
    {
        return "The date must be on or before {$this->referenceDateOrField}.";
    }

    public function name(): string
    {
        return 'before_or_equal';
    }
}
