<?php
/** User: Sabo */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

/** 
 * Class AuthController
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class AuthController extends Controller{

    /**
     * AuthController constructor
     */
    public function __construct(){
        //
    }
    
    public function login(Request $request){
        if($request->isPost()){
            $login = new RegisterModel();
            var_dump($request->getBody());
        }
        $this->setLayout("auth");
        return $this->render('login');
    }
    public function register(Request $request){
        $registerModel = new RegisterModel();
        $errors = [];
        if($request->isPost()){
            $register = new RegisterModel();
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()){
                return 'Success';
            }

            

            return $this->render('register', [
                'model' => $registerModel
            ]);    
        }
        $this->setLayout("auth");
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    /* first way 
    public function register(Request $request){
        $errors = [];
        if($request->isPost()){
            $register = new RegisterModel();
            var_dump($request->getBody());
            $firstname = $request->getBody()['first_name'];
            if (!$firstname){
                $errors['firstname'] = 'This filed is required!';
            }
        }
        var_dump($errors);
        return $this->render('register', [
            'errors' => $errors
            ]);
    }*/

}