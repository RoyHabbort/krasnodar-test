<?php

namespace Core\Config;

class ConfigReader {

    /**
     * Читаем файлы внешних конфигов
     * @param string $filePath
     * @return array|bool
     */
    public function readIniFile(string $filePath) {
        return parse_ini_file($filePath);
    }
}