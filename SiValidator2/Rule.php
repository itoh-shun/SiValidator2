<?php

namespace SiLibrary\SiValidator2;

use SiLibrary\SiValidator2\Rules\ExistsRule;
use SiLibrary\SiValidator2\Rules\UniqueRule;

class Rule
{
    public static function exists(string $table, string $column = null)
    {
        return new ExistsRule($table, $column);
    }
    public static function unique(string $table, string $column = null)
    {
        return new UniqueRule($table, $column);
    }
}
