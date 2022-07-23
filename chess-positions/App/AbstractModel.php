<?php

namespace App;

abstract class AbstractModel
{
    /**
     * @var string
     */
    protected static $table = '';

    /**
     * @throws \Exception
     */
    public function __construct(array $positionRow)
    {
        if (!static::$table)
            throw new \Exception('Не задана таблица модели');

        foreach ($positionRow as $column => $value)
            $this->$column = $value;
    }

    /**
     * @throws \Exception
     */
    public static function getById(int $id): ?self
    {
        $positionRow = DB::getInstance()->getRow(
            sprintf('SELECT * FROM `%s` WHERE `id` = %d', static::$table, $id)
        );

        if (!$positionRow) return null;

        return new static($positionRow);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getField(string $name)
    {
        return $this->$name ?? '';
    }
}