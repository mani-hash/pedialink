<?php

namespace Library\Framework\Routing;

use Library\Framework\Http\Request;
use Library\Framework\Http\Response;

/**
 * Base Router Class
 * 
 * Handles routing in the web application
 * including middleware registration and
 * execution.
 */
class Router
{
   /** @var array<string, array<string, array{action: callable|string, middleware: array}>> */
    protected array $routes = [];

     /** @var array<string, string> Named middleware registry */
    protected array $middlewareMap = [];

    /** @var string[] Global middleware keys applied to every route */
    protected array $globalMiddleware = [];

    /**
     * Register available middlewares
     * @param string $key Middleware name
     * @param string $middlewareClass Middleware class
     * @return void
     */
    public function registerMiddleware(string $key, string $middlewareClass)
    {
        $this->middlewareMap[$key] = $middlewareClass;
    }

    /**
     * Register globally active middlewares
     * @param string $key Middleware name
     * @return void
     */
    public function globalMiddleware(string $key)
    {
        $this->globalMiddleware[] = $key;
    }

    /**
     * Register a new route with optional middleware
     *
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $uri URI pattern
     * @param callable|string $action Controller@method or Closure
     * @param array $middleware List of middleware keys
     */
    public function addRoute(string $method, string $uri, $action, array $middleware = []): void
    {
        $this->routes[strtoupper($method)][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    /**
     * Dispatch an incoming request to the appropriate route
     * @param Request $request Request object
     * @return Response|null Returns response object or null
     */
    public function dispatch(Request $request): Response|null
    {
        $method = strtoupper($request->method);
        $uri    = $request->uri;

        // If uri is not in the routes list
        if (!isset($this->routes[$method][$uri])) {
            return new Response('404 Not Found', 404);
        }

        $route = $this->routes[$method][$uri];
        $action = $route['action'];
        $middlewareKeys = $route['middleware'];

        // Build the middleware pipeline ending in the action
        $pipeline = array_reduce(
            array_reverse($middlewareKeys),
            function ($next, $key) {
                return function ($request) use ($next, $key) {
                    $middlewareClass = $this->middlewareMap[$key] ?? null;
                    if (!$middlewareClass) {
                        throw new \Exception("Middleware key '{$key}' not registered");
                    }
                    $middleware = new $middlewareClass;
                    return $middleware->handle($request, $next);
                };
            },
            // Final handler invokes controller or closure
            function ($request) use ($action) {
                if (is_callable($action)) {
                    return $action($request);
                }
                [$controller, $method] = explode('@', $action);
                $fqcn = "App\\Controllers\\{$controller}";
                $instance = new $fqcn;
                return $instance->$method($request);
            }
        );

        // Execute pipeline
        return $pipeline($request);
    }
}