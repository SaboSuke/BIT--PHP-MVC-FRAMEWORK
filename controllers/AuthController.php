<?php
/** User: Sabo */

namespace app\controllers;
use sabosuke\bit_mvc_core\Application;
use sabosuke\bit_mvc_core\Controller;
use sabosuke\bit_mvc_core\Request;
use sabosuke\bit_mvc_core\Response;
use app\models\LoginForm;
use app\models\User;
use sabosuke\bit_mvc_core\middlewares\AuthMiddleware;

/** 
 * Class AuthController
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package sabosuke\bit_mvc_core
*/

class AuthController extends Controller{

    public array $middleware_logs;

    /**
     * AuthController constructor
     */
    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    
    public function login(Request $request, Response $response){
        $loginForm = new LoginForm();
        if($request->isPost()){
            if($request->isPost()){
                $loginForm->loadData($request->getBody());
                if($loginForm->validate() && $loginForm->login()){
                    $response->redirect('/');
                    return;
                }
            }
        }
        $this->setLayout("auth");
        return $this->render('login',[
            'model' => $loginForm
        ]);
    }
    
    public function register(Request $request){
        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
            }
            
            return $this->render('register', [
                'model' => $user
            ]);    
        }
        $this->setLayout("auth");
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response){
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile(){
        return $this->render('profile');
    }

}