<?php

namespace SiLibrary\SiValidator2\Rules;

use SiLibrary\SiDateTime;

abstract class DateComparisonRule implements RuleInterface
{
    protected $referenceDateOrField;

    public function __construct($referenceDateOrField)
    {
        $this->referenceDateOrField = $referenceDateOrField;
    }

    public function validate($value, array $allValues = []): bool
    {
        if (!$this->processable($value)) {
            return false;
        }

        $valueDate = new SiDateTime($value);

        // Check if reference is another field's value
        if (isset($allValues[$this->referenceDateOrField])) {
            $refDateString = $allValues[$this->referenceDateOrField];
        } else {
            $refDateString = $this->referenceDateOrField;
        }

        if (!strtotime($refDateString)) {
            return false;  // The reference date is not a valid date
        }

        $refDate = new SiDateTime($refDateString);

        return $this->compareDates($valueDate, $refDate);
    }

    abstract protected function compareDates($valueDate, $refDate): bool;

    public static function processable($value): bool
    {
        return is_string($value);
    }
}
