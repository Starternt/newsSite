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
//        echo $uri;
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $intertalPath = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode("/", $intertalPath);
//                print_r($segments);
                $controllerName = array_shift($segments);
                $controllerName = ucfirst($controllerName)."Controller";
//                echo $controllerName;
                $actionName = array_shift($segments);
                $actionName = "action".ucfirst($actionName);
//                echo $actionName;
                $controllerFile = ROOT.'/controllers/'.$controllerName.".php";
                echo $controllerFile;
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