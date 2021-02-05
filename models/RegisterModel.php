<?php
/** User: Sabo */

namespace app\models;
use app\core\Controller;
use app\core\Request;
use app\core\Model;

/** 
 * Class RegisterModel
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class RegisterModel extends Model{

    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_validate = '';

    /**
     * RegisterModel constructor
     */
    public function __construct(){
        //
    }
    
    public function register(){
        //
    }
    
    public function rules():array{
        return [
            "first_name" => [self::RULE_REQUIRED],
            "last_name" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
            "password_validate" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

}