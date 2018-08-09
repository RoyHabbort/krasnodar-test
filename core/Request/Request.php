<?php

namespace Core\Request;

use Core\Request\Bug\Bug;

class Request implements RequestInterface {

    /** @var Bug  */
    protected $get;
    /** @var Bug  */
    protected $post;
    /** @var Bug  */
    protected $server;
    /** @var Bug  */
    protected $session;
    /** @var Bug  */
    protected $cookie;
    /** @var Bug  */
    protected $files;
    /** @var Bug  */
    protected $request;
    /** @var Bug  */
    protected $env;

    public function __construct($get, $post, $server, $session = [], $cookie = [], $files = [], $request = [], $env = []) {

        $this->get = new Bug($get);
        $this->post = new Bug($post);
        $this->server = new Bug($server);
        $this->session = new Bug($session);
        $this->cookie = new Bug($cookie);
        $this->files = new Bug($files);
        $this->request = new Bug($request);
        $this->env = new Bug($env);
    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public function get(string $name, $default = null) {
        try {
            $value = $this->get->get($name);
        }
        catch(\OutOfBoundsException $exception) {
            $value = $default;
        }
        return $value;
    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public function post(string $name, $default = null) {
        try {
            $value = $this->get->get($name);
        }
        catch(\OutOfBoundsException $exception) {
            $value = $default;
        }
        return $value;
    }

    /**
     * @return Bug
     */
    public function getServer(): Bug {
        return $this->server;
    }

    /**
     * @return Bug
     */
    public function getSession(): Bug {
        return $this->session;
    }

    /**
     * @return Bug
     */
    public function getCookie(): Bug {
        return $this->cookie;
    }

    /**
     * @return Bug
     */
    public function getFiles(): Bug {
        return $this->files;
    }

    /**
     * @return Bug
     */
    public function getRequest(): Bug {
        return $this->request;
    }

    /**
     * @return Bug
     */
    public function getEnv(): Bug {
        return $this->env;
    }

    /**
     * @return mixed
     */
    public function getMethod() {
        return $this->server->get('REQUEST_METHOD');
    }
}