<?php

/*
 * Фиксируем старт приложения
 */
define('APP_START', microtime(true));

/*
 * Подключаем автолоад композера, для удобного использования namespace
 */
require __DIR__.'/../vendor/autoload.php';

define('APP_DIR', __DIR__.'./../app');