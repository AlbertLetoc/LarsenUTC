<?php



class Router {
    static private $instance;

    private $routes;

    private $crawler;

    private $controllerFolder;

    private $configFolder;

    private $errorController;

    private $params;

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new Router();
        return self::$instance;
    }

    function __construct() {
        $this->crawler = new \DOMDocument();
        $this->params = array();
    }

    public function setFolders($configFolder, $controllerFolder, $errorController) {
         $this->controllerFolder = $controllerFolder;
        $this->configFolder = $configFolder;
        $this->errorController = $errorController;
    }
    //Chargement des routes du fichier xml
    public function loadRoutes() {
        $this->crawler->load($this->configFolder.'/route.xml');
        foreach($this->crawler->childNodes->item(0)->childNodes as $route) {
            if($route->nodeName == "route") {  
                $newRoute = array(
                    "url"=> $route->getAttribute("path"),
                    "controller" => $route->getElementsByTagName("controller")->item(0)->nodeValue,
                    "action" => $route->getElementsByTagName("action")->item(0)->nodeValue
                );
                if($route->getElementsByTagName("requirements")->length != 0) {
                    $requirementsArray = array();
                    $requirements = $route->getElementsByTagName("requirements")->item(0)->childNodes;
                    for($i=0; $i < $requirements->length; $i++) {
                        if($requirements->item($i)->nodeName != "#text") {
                            if(strpos($newRoute["url"], ':'.$requirements->item($i)->nodeName) !== false) {
                                $requirementsArray[$requirements->item($i)->nodeName] = $requirements->item($i)->getAttribute("value");
                            }
                        }
                    }
                    if(!empty($requirementsArray)) {
                        $newRoute["requrements"] = $requirementsArray;
                    }
                }
                $this->routes[$route->getAttribute("id")] = $newRoute;
            }
        }
    }
    //Permet de rediriger vers le bon controller et de sortir les paramètres de l'URL. Envoi une erreur 404 si route inconnue
    public function matchRoute() {
        $requestedURL = explode('/', trim((isset($_GET['url'])) ? $_GET['url'] : '', '/'));
        $callRoute = null;
        foreach($this->routes as $route) {
            $url = explode('/', trim($route["url"], '/'));
            $params = array();
            if(count($requestedURL) == count($url)) {
                $status = true;
                for($i = 0; $i < count($url); $i++) {
                    if($url[$i] != '' && $url[$i][0] == ':') {
                        $params[substr($url[$i], 1)] = $requestedURL[$i];
                    }
                    elseif($url[$i] != $requestedURL[$i]) {
                        $status = false;
                        break;
                    }
                }
                if(!$status) {
                    unset($params);
                }
                else {
                    $callRoute = $route;
                    $this->params = $params;
                    break;
                }
            }
        }
        if($callRoute && is_file($this->controllerFolder.'/'.$callRoute["controller"].'Controller.php')) {
            include_once($this->controllerFolder.'/'.$callRoute["controller"].'Controller.php');
            $class = $callRoute["controller"].'Controller';
            $action = $callRoute["action"].'Action';
        }
        else {
            include_once($this->controllerFolder.'/'.$this->errorController.'Controller.php');
            $class = $this->errorController.'Controller';
            $action = "error404Action";
        }

        $controller = new $class();
        if(!is_callable(array($controller, $action))) {
            include_once($this->controllerFolder.$this->errorController.'Controller.php');
            $class = $this->errorController.'Controller';
            $action = "error404Action";

            $controller = new $class;
            $controller->$action();
        }
        else {
            $controller->$action($this->params);
        }
    }

    public function getParameters() {
        return $this->params;
    }

    public function getUrl($routeName, $params = null) {
        if(!array_key_exists($routeName, $this->routes)) {
            throw new \Exception('Route doesn\'t exist');
        }
        else {
            $url = $this->routes[$routeName]["url"];
            if($params && (!strpos($this->routes[$routeName]["url"], ':') !== false)) {
                throw new \Exception('This route doesn\'t expect parmameters');
            }
            else if(!$params && (strpos($this->routes[$routeName]["url"], ':') !== false)){
                throw new \Exception('This route needs parameters');
            }
            else if(strpos($this->routes[$routeName]["url"], ':') !== false) {
                foreach ($params as $key=>$value) {
                    $url = str_replace(":".$key, $value, $url);
                }
            }
            return '/larsenUTC'.$url;
        }
    }
}