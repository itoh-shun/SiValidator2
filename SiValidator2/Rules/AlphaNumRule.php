<?php

namespace SiLibrary\SiValidator2\Rules;

class AlphaNumRule extends RegexBasedRule
{
    protected function pattern(): string
    {
        return '/^[a-zA-Z0-9]+$/';
    }

    public function message(): string
    {
        return "The field may only contain letters and numbers.";
    }

    public function name(): string
    {
        return 'alpha_num';
    }
}
