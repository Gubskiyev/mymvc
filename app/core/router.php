<?php
class Router {

    public static function run() {

        $url = substr($_SERVER['REQUEST_URI'],1);
        $url = explode('/',$url);

        if(!empty($url[0])) {
            $controllerName = $url[0];
        } else {
            $controllerName = 'index';
        }

        if(!empty($url[1])) {
            $actionName = $url[1];
        } else {
            $actionName = 'index';
        }

        if(preg_match('/[0-9]+/',$url[1])) {

            $actionName = 'view';
        }
        $params = $url[1];

        $controllerFile = 'controller_'.$controllerName.'.php';
        $actionName = 'action'.ucfirst($actionName);
        $modelName = 'model_'.$controllerName.'.php';

        if(file_exists('app/controller/'.$controllerFile)) {
            include 'app/controller/'.$controllerFile;
        } else {
            self::Error404();
        }

        if(file_exists('app/model/'.$modelName)) {
            include 'app/model/'.$modelName;
        } else throw new Exception('Not found Model!');

        $controllerName = 'Controller'.ucfirst($controllerName);
        $controllerObj = new $controllerName;


        if(method_exists($controllerObj,$actionName)) {
            $controllerObj->$actionName($params);
        } else {
            //self::Error404();
        }


        //$result = call_user_func_array(array($controllerObj,$actionName),$params);
        //$result = $controllerObj->$actionName($params);

    }

    public static function Error404() {
        header('Location: /404');
    }
}