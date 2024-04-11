<?php

namespace SiLibrary\SiValidator2\Rules;

class ConfirmedRule implements RuleInterface
{
    private $confirmationFieldName;

    public function __construct(string $fieldName)
    {
        $this->confirmationFieldName = $fieldName . "_confirmation";
    }

    public static function processable($value): bool
    {
        return true; // このルールは任意の値タイプに適用可能
    }

    public function validate($value, array $allValues = []): bool
    {
        return isset($allValues[$this->confirmationFieldName]) && $value === $allValues[$this->confirmationFieldName];
    }

    public function message(): string
    {
        return "The confirmation does not match.";
    }

    public function name(): string
    {
        return 'confirmed';
    }
}
