<?php
/** User: Sabo */

namespace app\core;

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

}