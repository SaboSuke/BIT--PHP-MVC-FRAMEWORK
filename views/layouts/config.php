<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
<?php
use \sabosuke\bit_mvc_core\Application;
use app\models\Theme;

//$initTheme = Application::InitTheme()->filterThemes("")[1] ?? "";
if (Application::$app->session->get('theme_name')){
    $theme = '/themes/'.Application::$app->session->get('theme_name') . '.css';
}else{
    
    $theme =  (!empty($initTheme) ? "/themes/".$initTheme : "bootstrap.min.css"); 
}
$my_theme = new Theme();

$theme_selection = $my_theme->generateThemeSelection();

use app\models\Test;
$test = new Test();
/*
if($test->_select("themes") === $query = $test->_select("themes"))
    echo true;
else
    echo false;*/
//->_where("theme");
//$query = $test->_select("themes", null, []);