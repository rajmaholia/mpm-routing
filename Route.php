<?php
namespace Mpm\Routing;

class Route {
  
    private $uri;
    
    private $handler;
    
    private $method;
    
    private $name;
    
    private static $routes = [];
  
    public function name($name){
      $this->name = $name;
      return $this;
    }
    
    public function getName() {
      return $this->name;
    }
  
    public function getUri() {
      return $this->uri;
    }
    
    public function getMethod() {
      return $this->method;
    }
    
    public function getHandler() {
      return $this->handler;
    }
  
    public static function get($uri, $handler) {
        return static::addRoute('GET', $uri, $handler);
    }

    public static function post($uri, $handler) {
        return static::addRoute('POST', $uri, $handler);
    }

    public static function addRoute($method, $uri, $handler) {
        $route = new static;
        $route->uri = $uri;
        $route->method = $method;
        $route->handler = $handler;
        static::$routes[] = $route;
        return $route;
    }

    public static function getRoutes() {
        return static::$routes;
    }
    
}


