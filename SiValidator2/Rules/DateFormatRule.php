<?php

namespace SiLibrary\SiValidator2\Rules;

// Date Equals Rule
class DateFormatRule implements RuleInterface
{
    private $format;

    public function __construct($format)
    {
        $this->format = $format;
    }

    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        $dateTime = \DateTime::createFromFormat($this->format, $value);
        return $dateTime && $dateTime->format($this->format) === $value;
    }

    public function message(): string
    {
        return "The field must match the format {$this->format}.";
    }

    public function name(): string
    {
        return 'date_format';
    }
}
