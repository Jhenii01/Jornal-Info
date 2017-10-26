<?php



namespace Lib;

/**
 * Description of router
 *
 * @author Jheny
 */

/**
 * Classe resolvedora de URLs (Rotas)
 */
class Router {

    protected $controller; //diz qual controller é chamado
    protected $action; //diz qual action é chamada 
    protected $route; //se vai ser normal ou admin
    protected $methodPrefix;
    protected $language; //qual idioma

    function getController() {
        return $this->controller;
    }

    function getAction() {
        return $this->action;
    }

    function getRoute() {
        return $this->route;
    }

    function getMethodPrefix() {
        return $this->methodPrefix;
    }

    function getLanguage() {
        return $this->language;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function setAction($action) {
        $this->action = $action;
    }

    function setRoute($route) {
        $this->route = $route;
    }

    function setMethodPrefix($methodPrefix) {
        $this->methodPrefix = $methodPrefix;
    }

    function setLanguage($language) {
        $this->language = $language;
    }

    function __construct() {
        //carrega padroes

        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->language = Config::get('default_languages'); //no do gui ta language

        //Rota
        $route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_STRING);
        if ($route != FALSE && isset($routes[$route])) {
            $this->route = $route;
            $this->methodPrefix = $routes[$route];
        }
        //controller
        $modulo = filter_input(INPUT_GET, 'modulo', FILTER_SANITIZE_STRING);
        if ($modulo != FALSE) {
            $this->controller = strtolower($modulo);
        }
        //action
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if ($action != FALSE) {
            $this->action = strtolower($action);
        }
        //language
        $lang = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
        if ($lang != FALSE && in_array($lang, Config::get('Languages'))) {
            $this->language = $lang;
        }
        // var_dump($_GET);

        /*echo "Route: {$this->getRoute()} </br>"
        . "Prefix: {$this->getMethodPrefix()} </br>"
        . "Controller: {$this->getController()} </br>"
        . "Action: {$this->getAction()} </br>"
        . "Language: {$this->getLanguage()}  </br>";*/
    }

}
