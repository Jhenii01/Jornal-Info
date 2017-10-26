<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

use Lib\Router;
use Lib\View;
use Lib\Lang;
/**
 * Description of App
 *
 * @author Jheny
 */
class App {
    //put your code here
    
    /**
     *
     * @var Router
     */
    protected static $router;
    
    static function getRouter() {
        return self::$router;
    }

    public static function run(){
        //carrega o router e o idioma
        self::$router =  new Router();
        Lang::load(self::$router->getLanguage());
        
        //Carrega informações do controller
        $controller_class = 'Controllers\\' . ucfirst(self::$router->getController()) . 'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());
        
         //Chama o controller
        $controller =  new $controller_class();
        if (method_exists($controller, $controller_method)){
            $view_path = $controller->$controller_method();//aqui ta diferente
            $view_object = new View($controller->getData(), $view_path);
            
            //Renderiza a view interna
            $content = $view_object->render(); 
        }else{
            throw new \Exception("Metodo {$controller_method} da classe {$controller_class} nao existe ");
        }
        
        //Renderiza a pagina final e exibe
        $layout = self::$router ->getRoute();
        $layout_path = VIEW_PATH . DS .$layout . '.php';
        $layout_view_object = new View(compact('content'),$layout_path);
        
        echo $layout_view_object->render();
                
    }
}
