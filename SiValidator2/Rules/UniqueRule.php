<?php

namespace SiLibrary\SiValidator2\Rules;

use SiLibrary\SpiralConnecter\SpiralDB;

class UniqueRule implements RuleInterface
{
    protected $model;
    protected $column;
    protected $ignoreId = null;
    protected $ignoreColumn = 'id';

    public function __construct(string $table, ?string $column = null)
    {
        if(!class_exists('SpiralDB')){
            throw new \LogicException('Not exists SpiralDB Library');
        }
        $this->model = SpiralDB::title($table);
        $this->column = $column ?? 'id';
    }
    public function ignore($id, $column = 'id')
    {
        $this->ignoreId = $id;
        $this->ignoreColumn = $column;
        return $this;
    }

    public static function processable($value): bool
    {
        return true;
    }

    public function where(callable $callback):self{
        $this->model = $callback($this->model);
        return $this;
    }

    public function validate($value, array $allValues = []): bool
    {
        $query = $this->model->where($this->column, $value);
        if ($this->ignoreId !== null) {
            $query->where($this->ignoreColumn, $this->ignoreId, '!=');
        }
        return !$query->get()->count() > 0;
    }

    public function message(): string
    {
        return "The :attribute has already been taken.";
    }

    public function name(): string
    {
        return 'unique';
    }
}
