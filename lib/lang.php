<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

/**
 * Description of Lang
 *
 * @author m_jhe
 */
class Lang {
    //put your code here
    
    protected static $data;
    
    public static function load($lang_code){
        
        $lang_path = ROOT . DS . 'lang' . DS . strtolower($lang_code). '.php';
        
        if(file_exists($lang_path)){
            self::$data = include $lang_path;
        }else{ 
            throw new \Exception("Arquivo de idioma nao foi encontrado: {$lang_path}");
        }
    }
    
    public static function get ($key, $default = ''){
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default ;
    }
}
