<?php

namespace SiLibrary\SiValidator2\Rules;

class InRule implements RuleInterface
{
    /**
     * @var array 許可された値のリスト
     */
    protected array $allowedValues;

    /**
     * コンストラクタで許可された値を設定します。
     *
     * @param array $allowedValues
     */
    public function __construct(string ...$allowedValues)
    {
        $this->allowedValues = $allowedValues;
    }

    public static function processable($value, $field = null): bool
    {
        return true; // 全ての値を処理可能
    }

    public function validate($value, $allValues = []): bool
    {
        if(empty($value)){
            return true;
        }
        // 許可された値に含まれているかを確認
        return in_array($value, $this->allowedValues, true);
    }

    public function message(): string
    {
        return ':attribute には許可された値のいずれかを指定してください: ' . implode(', ', $this->allowedValues) . '.';
    }

    public function name(): string
    {
        return 'in';
    }
}