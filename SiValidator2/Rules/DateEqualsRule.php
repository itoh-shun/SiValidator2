<?php

namespace SiLibrary\SiValidator2\Rules;

// Date Equals Rule
class DateEqualsRule implements RuleInterface
{
    private $referenceDate;

    public function __construct($referenceDate)
    {
        $this->referenceDate = $referenceDate;
    }

    public static function processable($value): bool
    {
        return is_string($value) && (strtotime($value) !== false);
    }

    public function validate($value, array $allValues = []): bool
    {
        $timestampValue = strtotime($value);
        $timestampReference = strtotime($this->referenceDate);
        return $timestampValue === $timestampReference;
    }

    public function message(): string
    {
        return "The field must be equal to {$this->referenceDate}.";
    }

    public function name(): string
    {
        return 'date_equals';
    }
}
