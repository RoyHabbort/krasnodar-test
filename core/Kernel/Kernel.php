<?php

namespace Core\Kernel;

use Core\Request\RequestInterface;
use Core\Response\Response;
use Core\Response\ResponseInterface;

class Kernel implements ApplicationInterface {

    public function getResponse(): ResponseInterface {
        $response = new Response();
        return $response;
    }

    public function init(RequestInterface $request) {
        // TODO: Implement init() method.
    }

    public function register(string $singletonName, ModuleInterface $singleton) {
        // TODO: Implement register() method.
    }
}