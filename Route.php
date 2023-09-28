<?php
namespace Mpm\Routing;

/**
 * Class Route
 * 
 * Represents a route in the routing system.
 * Routes define the URI, HTTP method, handler, and optional name for routing purposes.
 *
 * @package Mpm\Routing
 */
class Route {
  
    /**
     * The URI pattern for the route.
     *
     * @var string
     */
    private $uri;
    
    /**
     * The handler or action associated with the route.
     *
     * @var mixed
     */
    private $handler;
    
    /**
     * The HTTP method for the route (e.g., GET, POST).
     *
     * @var string
     */
    private $method;
    
    /**
     * The optional name of the route for easy referencing.
     *
     * @var string|null
     */
    private $name;
    
    /**
     * An array to store all defined routes.
     *
     * @var array
     */
    private static $routes = [];
  
    /**
     * Set the name for the route.
     *
     * @param string $name
     * @return Mpm\Routing\Route
     */
    public function name($name){
      $this->name = $name;
      return $this;
    }
    
    /**
     * Get the name of the route.
     *
     * @return string|null
     */
    public function getName() {
      return $this->name;
    }
  
    /**
     * Get the URI pattern of the route.
     *
     * @return string
     */
    public function getUri() {
      return $this->uri;
    }
    
    /**
     * Get the HTTP method of the route.
     *
     * @return string
     */
    public function getMethod() {
      return $this->method;
    }
    
    /**
     * Get the handler or action associated with the route.
     *
     * @return mixed
     */
    public function getHandler() {
      return $this->handler;
    }
  
    /**
     * Define a new GET route.
     *
     * @param string $uri
     * @param mixed $handler
     * @return Mpm\Routing\Route
     */
    public static function get($uri, $handler) {
        return static::addRoute('GET', $uri, $handler);
    }

    /**
     * Define a new POST route.
     *
     * @param string $uri
     * @param mixed $handler
     * @return Mpm\Routing\Route
     */
    public static function post($uri, $handler) {
        return static::addRoute('POST', $uri, $handler);
    }

    /**
     * Add a new route to the routes list.
     *
     * @param string $method
     * @param string $uri
     * @param mixed $handler
     * @return Mpm\Routing\Route
     */
    public static function addRoute($method, $uri, $handler) {
        $route = new static;
        $route->uri = $uri;
        $route->method = $method;
        $route->handler = $handler;
        static::$routes[] = $route;
        return $route;
    }

    /**
     * Get all defined routes.
     *
     * @return array
     */
    public static function getRoutes() {
        return static::$routes;
    }
    
}
?>