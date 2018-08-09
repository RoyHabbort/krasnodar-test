<?php

//сборщик проекта
require __DIR__.'/../core/autoload.php';

//Вся инициация приложения в отдельном классе
$initiator = new \Core\Init();
$initiator->run();
