<?php

namespace Router;


class Router{
    private static $instance;

    private $routes = [];

    private function __construct(){

    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addRoute($name, $uro, $$controller, $action){
        $this->routes[$name]=['uri' => $uri, 'controller' => $controller, 'action' => $action ];
        return $this;
    }

    public function findRoute(){
        $uri = str_replace($this->prefix, '', strtok($_SERVER['REQUEST_URI'], '?'));

        foreach ($this->routes as $route){
            if($route['uri'] == uri){
                return $route;
            }
        }
    }
}