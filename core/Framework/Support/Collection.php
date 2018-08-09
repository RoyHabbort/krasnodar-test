<?php

namespace Core\Framework\Support;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class Collection implements ArrayAccess, Arrayable, Countable, Jsonable, JsonSerializable, IteratorAggregate {

    protected $items = [];

    public function __construct($items = []) {
        $this->items = $items;
    }

    public function all() {
        return $this->items;
    }

    /**
     * Получить количество объектов коллекции
     *
     * @return int
     */
    public function count() {
        return count($this->items);
    }

    /**
     * Получить первый элемент коллекции
     * !Указатель так же окажется на первом элементе
     *
     * @return mixed
     */
    public function first() {
        return reset($this->items);
    }

    /**
     * Получить последний элемент коллекции
     * !Указатель, так же останется на последнем элементе
     *
     * @return mixed
     */
    public function last() {
        return end($this->items);
    }

    /**
     * Получить элемент коллекции
     *
     * @param $key
     * @param mixed $default
     * @return mixed|null
     */
    public function get($key, $default = null) {
        if ($this->offsetExists($key)) {
            return $this->items[$key];
        }

        return $default;
    }

    /**
     * Проверяет пуста ли коллекция
     *
     * @return bool
     */
    public function isEmpty() {
        return empty($this->items);
    }

    /**
     * Проверяет на существование элемента коллекции
     *
     * @param $key
     * @return bool
     */
    public function has($key) {
        return $this->offsetExists($key);
    }

    /**
     * Получить коллекцию ключей, текущей коллекции
     *
     * @return static
     */
    public function keys() {
        return new static(array_keys($this->items));
    }

    /**
     * Добавить элемент коллекции
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function put($key, $value) {
        $this->offsetSet($key, $value);

        return $this;
    }

    /**
     * Положить элемент в конец коллекции
     *
     * @param $value
     * @return $this
     */
    public function push($value) {
        $this->offsetSet(null, $value);

        return $this;
    }

    /**
     * Получить коллекцию, основанную только на значениях текущей
     *
     * @return static
     */
    public function values() {
        return new static(array_values($this->items));
    }

    /**
     * Получить итератор по объектам коллекции
     *
     * @return ArrayIterator
     */
    public function getIterator() {
        return new ArrayIterator($this->items);
    }

    /**
     * Получить список объектов коллекции в виде массива
     *
     * @return array
     */
    public function toArray(): array {
        return array_map(function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : $value;
        }, $this->items);
    }

    /**
     * Проверяем наличие элемента в коллекции
     *
     * @param mixed $key
     * @return bool
     */
    public function offsetExists($key) {
        return array_key_exists($key, $this->items);
    }

    /**
     * Получаем элемент коллекции
     *
     * @param mixed $key
     * @return mixed
     */
    public function offsetGet($key) {
        return $this->items[$key];
    }

    /**
     * Добавляем элемент коллекции
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function offsetSet($key, $value) {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Удаляем элемент из коллекции
     *
     * @param mixed $key
     */
    public function offsetUnset($key) {
        unset($this->items[$key]);
    }

    /**
     * Сериализует объект, со всеми внутренностями, и предоставляет его как массив.
     *
     * @return array
     */
    public function jsonSerialize() {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } elseif ($value instanceof Jsonable) {
                return json_decode($value->toJson(), true);
            } elseif ($value instanceof Arrayable) {
                return $value->toArray();
            } else {
                return $value;
            }
        }, $this->items);
    }

    /**
     * Предоставляет список объектов коллекции в виде json строки
     *
     * @param int $options
     * @return string
     */
    public function toJson(int $options = 0) : string{
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Конвертирует коллекцию в строковое представление, используя json.
     * Выполнится, если мы захотим обратиться к коллекции как к строке нативными средствами
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * @param $items
     * @return array|mixed
     */
    protected function getArrayableItems($items) {
        if (is_array($items)) {
            return $items;
        } elseif ($items instanceof self) {
            return $items->all();
        } elseif ($items instanceof Arrayable) {
            return $items->toArray();
        } elseif ($items instanceof Jsonable) {
            return json_decode($items->toJson(), true);
        } elseif ($items instanceof JsonSerializable) {
            return $items->jsonSerialize();
        } elseif ($items instanceof Traversable) {
            return iterator_to_array($items);
        }

        return (array) $items;
    }
}