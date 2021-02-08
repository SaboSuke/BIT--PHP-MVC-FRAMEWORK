<?php
/** User: Sabo */

namespace app\models;
use app\core\Controller;
use app\core\Request;
use app\core\Model;
use app\core\Application;

/** 
 * Class LoginForm
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\models
*/

class LoginForm extends Model{

    public string $email = '';
    public string $password = '';

    /**
     * LoginForm constructor
     */
    public function __construct(){
        //
    }

    public function login(){
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'User does not exist');
            return false;
        }else{
            if(!password_verify($this->password, $user->password)){
                $this->addError('password', 'Password is incorrect');
                return false;
            }
        }

        return Application::$app->login($user);
    }

    public function rules():array{
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED],
        ];
    }
    
    public function labels(): array{
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

};