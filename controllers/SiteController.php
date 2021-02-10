<?php
/** User: Sabo */

namespace app\controllers;
use sabosuke\bit_mvc_core\Controller;
use sabosuke\bit_mvc_core\Request;
use sabosuke\bit_mvc_core\Response;
use app\models\ContactForm;
use app\models\Theme;
use sabosuke\bit_mvc_core\Application;
/** 
 * Class SiteController
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package sabosuke\bit_mvc_core
*/

class SiteController extends Controller{

    /**
     * SiteController constructor
     */
    public function __construct(){
        //
    }

    public function contact(Request $request, Response $response){
        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thanks for contacting us. We\'ll reply as soon as possible');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
    
    public function theme(Request $request, Response $response){
        $theme = new Theme();
        if($request->isGet()){
                $params = $request->getBody();
                var_dump($params);
                Application::$app->session->set('theme_name', $params['name']);
                Application::$app->session->setFlash('success', 'Theme has been changed successfully!');
                return $response->redirect('/');
        }
        return $response->redirect('/');
    }

    public function home(){
        $params=[
            'name'=>'Home Page'
        ];
        return $this->render('home', $params);
    }

}