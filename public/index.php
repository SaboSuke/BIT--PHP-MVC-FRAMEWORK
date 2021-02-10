<?php
/** User: Sabo */

use app\controllers\SiteController; 
use app\controllers\AuthController; 
use \sabosuke\bit_mvc_core\Application;
use \sabosuke\bit_mvc_core\app\Database;
use \sabosuke\bit_mvc_core\Router;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'themeClass'=> \app\models\Theme::class,
    'userClass'=> \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
        ]
];

$app = new Application(dirname(__DIR__), $config);

/*to do before the request is made
$app->on(Application::EVENT_BEFORE_REQUEST, function(){
    echo "Before request";
});*/
/*to do after the request is made
$app->on(Application::EVENT_AFTER_REQUEST, function(){
    echo "After request";
});*/

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/profile', [AuthController::class, 'profile']);

$app->router->get('/change-theme', [SiteController::class, 'theme']);

$app->run();