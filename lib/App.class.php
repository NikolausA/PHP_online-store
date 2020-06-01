<?php
require_once $_SERVER['DOCUMENT_ROOT']."/config.php";
class App
{
    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow');
//        db::getInstance()->Connect(DB_USER, DB_PASS, DB_NAME);

        if (isset($_SERVER) && isset($_GET)) {
            self::web($_GET['path'] ? $_GET['path'] : '');
        }
    }
	
  //http://site.ru/index.php?path=News/delete/5

    protected static function web($url)
    {
        $url = explode("/", $url);
        if (!empty($url[0])) {
        $_GET['page'] = $url[0];
        if (isset($url[1])) {
            if (is_numeric($url[1])) {
                $_GET['id'] = $url[1];
            } else {
                $_GET['action'] = $url[1];
            }
            if (isset($url[2])) {
                $_GET['id'] = $url[2];
            }
        }
    }
        else{
            $_GET['page'] = 'index';
        }

        if (isset($_GET['page'])) {
            $controllerName = ucfirst($_GET['page']) . 'Controller';//IndexController
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();

            $data = [
                'content_data' => $controller->$methodName($_GET),
                'title' => $controller->title,
                'menu' => $controller->setMenu()
            ];

            $view = $controller->view . '.html';
            if (!isset($_GET['asAjax'])) {
                $loader = new Twig_Loader_Filesystem('../v');
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate($view);
                

                echo $template->render($data);
            } else {
                echo json_encode($data);
            }
        }
    }


}