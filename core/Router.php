<?php
/** User: Sabo */

namespace app\core;
use app\core\Request;
use app\core\Response;

/** 
 * Class Router
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class Router{
    
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router constructor
     * 
     * @param \core\app\Request $request
     * @param \core\app\Response $response
     */
    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback){ 
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
            
        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            //creating an instance of the class $callback[0] = SiteController::class
            Application::$app->controller = new $callback[0](); //controller name
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }

    //content rendering passed in parameter
    public function renderContent($view_content){
        $layout_content = $this->layoutContent();
        return str_replace('{{content}}', $view_content, $layout_content);
    }

    public function renderView($view, $params = []){
        $layout_content = $this->layoutContent();
        $view_content = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $view_content, $layout_content);
    }
    
    protected function layoutContent(){
        $layout = Application::$app->controller->layout;
        //start the output caching ==> nothing is outputted to the browser
        ob_start();
        include_once Application::$ROOT_DIRECTORY."/views/layouts/$layout.php";
        return ob_get_clean(); // returns whatever is already buffered and clears the buffer
        
    }

    protected function renderOnlyView($view, $params){
        foreach($params as $key => $val){
            /*  $key = "name"
                $$key = $name   */
            $$key = $val;
        }
        ob_start();
        include_once Application::$ROOT_DIRECTORY."/views/$view.php"; 
        return ob_get_clean();  
    }

}