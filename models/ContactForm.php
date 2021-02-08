<?php
/** User: Sabo */

namespace app\models;
use app\core\Controller;
use app\core\Request;
use app\core\Model;
use app\core\Application;

/** 
 * Class ContactForm
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\models
*/

class ContactForm extends Model{

    public string $subject = '';
    public string $email = '';
    public string $body = '';

    /**
     * ContactForm constructor
     */
    public function __construct(){
        //
    }

    public function send(){
        return true;
    }

    public function rules():array{
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "subject" => [self::RULE_REQUIRED],
            "body" => [self::RULE_REQUIRED],
        ];
    }
    
    public function labels(): array{
        return [
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Message',
        ];
    }

};