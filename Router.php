<?php
namespace Mpm\Routing;
use Mpm\Http\Request;

/**
 * Class Router
 *
 * The Router class handles routing and request handling in the application.
 *
 * @package Mpm\Routing
 */
class Router
{ 
    /**
     * An array to store defined routes.
     *
     * @var array
     */
    private static $routes = [];
    
    /**
     * Private constructor to prevent external instantiation.
     */
    private function __construct(){
      
    }
    
    /**
     * Match a request URI and method to a registered route.
     *
     * @param string $requestUri
     * @param string $requestMethod
     * @return array|null An array containing the matched handler and parameters, or null if no match is found.
     */
    public static function match($requestUri, $requestMethod)
    {
        foreach (Route::getRoutes() as $route) {
            if($route->getMethod()!=$requestMethod) continue;
            
            $uri = $route->getUri();
            $handler = $route->getHandler();
            
            $uri = preg_replace('/\//', '\\/', $uri);
            $uri = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[^\/]+)', $uri);
            $uri = '/^' . $uri . '$/i';

            if (preg_match($uri, $requestUri, $matches)) {
                return [
                    'handler' => $handler,
                    'params' => array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY)
                ];
            }
        }

        return null;
    }
    
    /**
     * Run the router and execute the matched route's handler.
     *
     * @param Request $request
     */
    public static function run(Request $request)
    {    
        $requestMethod = $request->method();
        $requestUri   = $request->uri();
        $route = self::match($requestUri, $requestMethod);
        
        if (!$route) {
            // handle 404 error
            echo '404 Not Found';
            exit();
        }

        $handler = $route['handler'];
        $params = $route['params'];

        $params = array_values([$request,...$params]);

        if (is_string($handler)) {
            $handler    = explode('@', $handler);
            $controller = new ($handler[0]);
            $method     = $handler[1];
            
            return call_user_func_array([$controller, $method], $params);
        } elseif (is_callable($handler)) {
            return call_user_func_array($handler, $params);
        }
        elseif(is_array($handler)){
          $controller = new (handler[0]);
          $method = $handler[1];
          
          return call_user_func_array([$controller, $method], $params);
        }
    }
    
    /**
     * Include additional route files.
     *
     * @param string $path
     */
    public static function includes($path) {
      $vendor = dirname(dirname(__DIR__));
      $base = dirname($vendor);

    }
    
   /**
     * Get all registered routes.
     *
     * @return array
     */  
    public static function routes(){
      return Route::getRoutes();
    }
    
}
