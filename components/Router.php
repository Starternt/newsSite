<?php

class Router
{
    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalPath = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode("/", $internalPath);

                $controllerName = array_shift($segments);
                $controllerName = ucfirst($controllerName)."Controller";

                $actionName = array_shift($segments);
                $actionName = "action".ucfirst($actionName);

                $controllerFile = ROOT.'/controllers/'.$controllerName.".php";

                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                $parameters = $segments;
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null){
                    break;
                }
            }
        }
    }

}