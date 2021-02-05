<?php
/** User: Sabo */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

/** 
 * Class SiteController
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core
*/

class SiteController extends Controller{

    /**
     * SiteController constructor
     */
    public function __construct(){
        //
    }

    public function contact(){
        return $this->render('contact');
    }
    
    public function home(){
        $params=[
            'name'=>'Home Page'
        ];
        return $this->render('home', $params);
    }

    public function handleContact(Request $request){
        $body = $request->getBody();
        var_dump($body);
        return "handling submitted data...";
    }

}