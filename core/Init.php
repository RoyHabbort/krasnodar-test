<?php

namespace Core;

use Core\Exceptions\MyException;
use Core\exceptionsHandler\ExceptionHandlerFactory;
use Core\Kernel\ApplicationInterface;
use Core\Kernel\Kernel;
use Core\Request\RequestFactory;

class Init {

    public function run() {

        try {
            $kernel = $this->getApplication();
            $kernel->init(RequestFactory::getOrCreateCurrentRequest());

            $response = $kernel->getResponse();
        }
        catch (MyException $myException) {
            $handler = ExceptionHandlerFactory::getHandler($myException);
            $handler->run();
            //еще будут логи
        }
        catch (\Exception $exception) {
            //здесь должна показываться заглушка, а само исключение падать в логи
        }
    }

    public function getApplication() : ApplicationInterface {
        return new Kernel();
    }

}