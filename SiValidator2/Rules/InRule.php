<?php

namespace SiLibrary\SiValidator2\Rules;

class InRule implements RuleInterface
{
    protected $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public static function processable($value): bool
    {
        return true;  // 常にこのルールを処理
    }

    public function validate($value, array $allValues = []): bool
    {
        return in_array($value, $this->values, true);
    }

    public function message(): string
    {
        return "この値は有効な選択肢のいずれかでなければなりません。";
    }

    public function name(): string
    {
        return 'in';
    }
}