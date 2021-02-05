<?php
/** User: Sabo */

namespace app\models;
use app\core\Controller;
use app\core\Request;

/** 
 * Class RegisterModel
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class RegisterModel extends Controller{

    public string $first_name;
    public string $last_name;
    public string $email;
    public string $password;
    public string $password_validate;
    
    /**
     * RegisterModel constructor
     */
    public function __construct(){
        //
    }
    
    public function login(Request $request){
        if($request->isPost()){
            $register = new RegisterModel();
        }
        return $this->render('login');
    }

    public function register(){
        return $this->render('register');
    }

}