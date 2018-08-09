<?php

namespace Core\Kernel;

use Core\Request\RequestInterface;
use Core\Response\ResponseInterface;

interface ApplicationInterface {

    /**
     * Регистрируем модули, как синглтоны внутри приложения
     * !не путать с классическим патерном синглтонов, постоенном на статике
     * @param string $singletonName
     * @param ModuleInterface $singleton
     * @return mixed
     */
    public function register(string $singletonName, ModuleInterface $singleton);

    public function init(RequestInterface $request);

    public function getResponse() : ResponseInterface;
}