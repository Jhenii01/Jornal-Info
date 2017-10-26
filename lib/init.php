<?php

spl_autoload_extensions('.php');
spl_autoload_register();

require_once ROOT . DS . 'config' . DS . 'config.php';

function __($key,$default = ''){
    return \Lib\Lang::get($key,$default);    
}