<?php

class Definitions
{

    public function getPostContent(){
        if(isset($_POST)){
            return json_decode(file_get_contents('php://input'));
        }
        return false;
    }

    public function getPost()
    {
        $uri = new stdClass();
        $uri = self::chopURL();
        $postData = self::prepareRequest($uri);
        if($postData !== false)
        {
            $className = ucfirst($postData->class);
            $classMethod = $postData->method;
            $res = $className::$classMethod();
            echo json_encode($res);
            die;
        }


    }

    public function getGet()
    {
        $url = self::chopURL();
        if(!empty($url))
        {

            $page = self::prepareObj($url);
            $name = $page->controller;
            if(class_exists($name)==true){
                $class = new $name();
                $data = $class->index($page);
                new View($data);
            }
        }
    }

    public function chopURL()
    {
        if(isset($_SERVER['REDIRECT_URL']))
        {
            return explode("/", $_SERVER['REDIRECT_URL']);
        }else{
            return 'Home';
        }
    }

    public function prepareObj($request)
    {
        $route = new stdClass();

        if(is_array($request))
        {

            foreach($request as $key=>$value)
            {

                if($key != 0)
                {

                    switch($key)
                    {
                        case 1:
                            $route->controller = ucfirst($value);
                        break;
                        default:
                            $route->partial[] = $value;
                    break;
                    }

                }

            }
            $route->data = NULL;

        }else{

            $route->controller = ucfirst($request);
            $route->partial = NULL;

        
        }

        $route->controller = self::checkUser($route->controller);

        $route->data = self::getData();
        return $route;
    }

    public function prepareRequest($input)
    {
        
        if(!empty($input))
        {
            $data = new stdClass();
            $data->class = $input[1];
            $data->method = $input[2];
            return $data;
        }

        return false;

    }

    public function getData()
    {
        $data = array();

        if(strpos($_SERVER['REQUEST_URI'], "?") == true){
        $precut = explode("&", substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?")+1, strlen($_SERVER['REQUEST_URI'])));

            foreach($precut as $key => $value)
            {
                $key = substr($value, 0, strpos($value, "="));
                $value = substr($value, strpos($value, "=")+1, strlen($value));
                $data[$key] = $value;
            }
        }else{
            $data = NULL;    
        }

        return $data;
    }


    public function checkUser($controller)
    {

        if($controller == 'Logout'){    
            session_destroy();
            header('location: ./');
        }

        if(Session::get('user')>0){
            error_log('controller name: '.$controller);
            return $controller;
        }

        if(!isset($_SESSION['user']) && ($controller == 'Register' || $controller == 'Resetpassword')){
            return $controller;
        }else{
            return 'Login';
        }

    }

    public function ifEmptyThenNull($string){
        if(trim($string)=='' || empty($string)){
            return NULL;
        }else{
            return $string;
        }
    }
}