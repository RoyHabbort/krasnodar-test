<?php

namespace Core\Request;

class RequestFactory {

    /** @var  Request */
    protected static $currentRequest;

    public static function getOrCreateCurrentRequest() {

        $session = $_SESSION ?? [];

        if (empty(static::$currentRequest)) {
            static::$currentRequest = new Request(
                $_GET,
                $_POST,
                $_SERVER,
                $session,
                $_COOKIE,
                $_FILES,
                $_REQUEST,
                $_ENV
            );
        }
        return static::$currentRequest;
    }

}