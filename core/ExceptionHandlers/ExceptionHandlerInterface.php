<?php

namespace Core\exceptionsHandler;

use Core\Exceptions\MyException;

/**
 * Интерфейс характеризующий классы, годные для обработки исключений
 * Interface ExceptionHandlerInterface
 * @package core\exceptionsHandler
 */
interface ExceptionHandlerInterface {

    public function __construct(MyException $exception);

    public function run();

}