<?php

namespace Core\Framework\Support;

interface Arrayable {

    /**
     * Отдать представление как массив
     *
     * @return array
     */
    public function toArray() : array;
}