<?php

namespace Core\exceptionsHandler;

use Core\Exceptions\MyException;

class MyExceptionHandler implements ExceptionHandlerInterface {

    protected $exception;

    /**
     * Обработчик всегда знает исключение, приведшее к нему.
     * MyExceptionHandler constructor.
     * @param MyException $exception
     */
    public function __construct(MyException $exception) {
        $this->exception = $exception;
    }

    public function run() {
        echo "Какая-нибудь обработка. Скорей всего страница заглушка";
    }

}