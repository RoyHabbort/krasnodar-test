<?php

namespace Core\Routes;

class Route {

    /** @var  string GET|POST */
    protected $type;
    /** @var   */
    protected $path;
    /** @var  string */
    protected $handler;

    public function __construct(string $type, string $path, string $controller) {
        $this->handler = $controller;
        $this->path = $path;
        $this->type = $type;
    }

    /**
     * @param string $type
     * @param string $path
     * @return bool
     */
    public function isRoute(string $type, string $path) {
        return $this->type == $type && $this->path = $path;
    }

    /**
     * @return string
     */
    public function getHandler() : string {
        return $this->handler;
    }
}