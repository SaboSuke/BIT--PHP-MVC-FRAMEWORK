<?php
/** User: Sabo */

namespace app\core;
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\core\Controller;

/** 
 * Class Application
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class Application{

    public static string $ROOT_DIRECTORY;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;

    public function __construct($rootPath){
        self::$ROOT_DIRECTORY = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(){
        echo $this->router->resolve();
    }

    /**
     * @param \app\core\Controller $controller
     */
    public function getController(){
        return $this->controller;
    }
    
    /**
     * @param \app\core\Controller $controller
     */
    public function setController(Controller $controller){
        $this->controller = $controller;
    }

}