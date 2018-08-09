<?php

namespace Core\Routes;

class RoutesRegister {

    public function register() {
        //@todo: сделать это настраиваемо
        $routesFiles = scandir(APP_DIR . 'http/routes/');
        $routesFiles = array_diff($routesFiles, ['.', '..']);

        foreach ($routesFiles as $routeFile) {
            include_once $routeFile;
        }
    }

}