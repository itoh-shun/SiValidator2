<?php

namespace SiLibrary\SiValidator2\Rules;

class AlphaDashRule extends RegexBasedRule
{
    protected function pattern(): string
    {
        return '/^[a-zA-Z0-9_-]+$/';
    }

    public function message(): string
    {
        return "The field may only contain letters, numbers, dashes, and underscores.";
    }

    public function name(): string
    {
        return 'alpha_dash';
    }
}
