<?php

namespace SiLibrary\SiValidator2\Rules;

// Date Rule
use DateTime;

class DateRule implements RuleInterface
{
    public static function processable($value): bool
    {
        return is_string($value);
    }

    public function validate($value, array $allValues = []): bool
    {
        $zone = null;
        $date = $value;
        if (!empty($timezone)) {
            $zone = new \DateTimeZone($timezone);
        }
        if (self::hasFormat($date, 'Y年m月d日')) {
            $date = \DateTime::createFromFormat('Y年m月d日', $date, $zone);
            $date = $date->format('Y-m-d H:i:s.u');
        } elseif (self::hasFormat($date, 'Y年m月d日 H時i分s秒')) {
            $date = \DateTime::createFromFormat(
                'Y年m月d日 H時i分s秒',
                $date,
                $zone
            );
            $date = $date->format('Y-m-d H:i:s.u');
        }

        return (!!(new DateTime($date, $zone)));
    }

    public static function hasFormat($date, $format)
    {
        return (bool) \DateTime::createFromFormat($format, $date);
    }

    public static function now($timezone = '')
    {
        return new self('now', $timezone);
    }

    public function message(): string
    {
        return "The field must be a valid date.";
    }

    public function name(): string
    {
        return 'date';
    }
}
