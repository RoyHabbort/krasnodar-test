<?php

namespace Core\exceptionsHandler;

use Core\Exceptions\MyException;

class ExceptionHandlerFactory {

    protected static $exceptionRoute = [
        MyException::class => MyExceptionHandler::class
    ];

    /**
     * Получаем обработчик для исключений. Если такового нет, то фатальная ошибка.
     *
     * По факту это обработчики последнего рубежа,
     * работающие только если само приложение было не в состоянии обработать исключение.
     *
     * @param MyException $exception
     * @return mixed
     * @throws \Exception
     */
    public static function getHandler(MyException $exception) {
        if (empty(static::$exceptionRoute[get_class($exception)])) {
            throw new \Exception('Fatal error! Exception handler not found.');
        }

        $handlerClass = static::$exceptionRoute[get_class($exception)];
        return new $handlerClass($exception);
    }
}