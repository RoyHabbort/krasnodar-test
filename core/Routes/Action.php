<?php

namespace Core\Routes;

use Core\Request\RequestInterface;

class Action {

    /** @var  RequestInterface */
    protected $request;

    public function __construct(RequestInterface $request) {
        $this->request = $request;
        $register = new RoutesRegister();
        $register->register();
    }

    public function getController() {

    }

}