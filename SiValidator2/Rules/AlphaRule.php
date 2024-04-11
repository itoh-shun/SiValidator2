<?php

namespace SiLibrary\SiValidator2\Rules;

class AlphaRule extends RegexBasedRule
{
    protected function pattern(): string
    {
        return '/^[a-zA-Z]+$/';
    }

    public function message(): string
    {
        return "The field must be entirely alphabetic characters.";
    }

    public function name(): string
    {
        return 'alpha';
    }
}
