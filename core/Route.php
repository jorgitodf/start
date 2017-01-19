<?php

namespace Core;

class Route {
    
    private $routes;
    
    public function __construct(array $routes) {
        $this->routes = $routes;
        $this->run();
    }

    private function getUrl() {
	return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
    }
    
    private function run() {
        $url = $this->getUrl();
        $urlArray = explode('/', $url);
        
        foreach ($this->routes as $route) {
            $routeArray = explode('/', $route[0]);
            for ($index = 0; $index < count($routeArray); $index++) {
                if ((strpos($routeArray[$index], "{") !== false) && (count($urlArray) == count($routeArray))) {
                    $routeArray[$index] = $urlArray[$index];
                }
                $route[0] = implode($routeArray, '/');
            }
            if ($url == $route[0]) {
                
            }
        }
    }
    
}
