<?php
/** User: Sabo */

namespace app\models;
use sabosuke\sabophp_mvc_core\Controller;
use sabosuke\sabophp_mvc_core\Request;
use sabosuke\sabophp_mvc_core\UserModel;

/** 
 * Class User
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\models
*/

class User extends UserModel{

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;

    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $password_validate = '';

    /**
     * User constructor
     */
    public function __construct(){
        //
    }

    public function tableName(): string{
        return 'users';
    }

    public function primaryKey(): string{
        return 'id';
    }
    
    //overriding save method
    public function save(){
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save(); //parent method
    }
    
    public function rules():array{
        return [
            "first_name" => [self::RULE_REQUIRED],
            "last_name" => [self::RULE_REQUIRED],
            "email" => [
                self::RULE_REQUIRED, self::RULE_EMAIL, [
                    self::RULE_UNIQUE, 'class' => self::class
                ]
            ],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
            "password_validate" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array{
        return ['first_name', 'last_name', 'email', 'password'];
    }
    
    public function labels(): array{
        return [
            'first_name' => 'First Name', 
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_validate' => 'Confirm Password'
        ];
    }

    public function displayName(): string{
        return $this->first_name.' '.$this->last_name;
    }

}