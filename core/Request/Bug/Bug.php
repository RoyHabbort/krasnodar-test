<?php

namespace Core\Request\Bug;

/**
 * Изначально предполагались специализированные пакеты, но не все сразу. экономим на не критичном
 * Class Bug
 * @package Core\Request\Bug
 */
class Bug {

    protected $data = [];

    public function __construct(array $data) {
        //@todo: вызможны функции предобработки
        $this->data = $data;
    }

    /**
     * @param string $propertyName
     * @throws \OutOfBoundsException
     * @return mixed
     */
    public function get(string $propertyName) {
        if (empty($this->data[$propertyName])) {
            throw new \OutOfBoundsException('Not isset required property');
        }
        return $this->data[$propertyName];
    }
}