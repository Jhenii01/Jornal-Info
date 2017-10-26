<?php

define('DS', DIRECTORY_SEPARATOR);
//diretorio dos arquivos
define('ROOT', dirname(__FILE__));// diz qual o caminho no sistema para chegar no arquivo php
define('VIEW_PATH', ROOT . DS . 'views');
use Lib\App;
require_once ROOT . DS . 'lib' . DS . 'init.php';

try {
    App::run();
} catch (Exception $ex) {
    echo "errorrrrr {$ex->getMessage()}";
}


