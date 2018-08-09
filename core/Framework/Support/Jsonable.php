<?php

namespace Core\Framework\Support;

interface Jsonable {

    /**
     * Получить представление в виде json строки
     *
     * @param int $options
     * @return string
     */
    public function toJson(int $options = 0) :string;
}