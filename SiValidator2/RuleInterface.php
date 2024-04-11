<?php

namespace SiLibrary\SiValidator2\Rules;

interface RuleInterface
{
    /**
     * Determines if the rule can process the given value.
     *
     * @param mixed $value
     * @return bool
     */
    public static function processable($value): bool;

    /**
     * Validates the given value.
     *
     * @param mixed $value
     * @return bool
     */
    public function validate($value, array $allValues = []): bool;

    /**
     * Returns the error message for the rule.
     *
     * @return string
     */
    public function message(): string;

    /**
     * Returns the name of the rule.
     *
     * @return string
     */
    public function name(): string;
}
