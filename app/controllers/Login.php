<?php
class Login 
{
    public function __constract($data = NULL)
    {
        return $his->index($data);
    }

    public function index($data)
    {
        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = 'ala ma kota';
        return $page;
    }

    public function loginUser(){

        if(isset($_POST))
        {
            $res = ApiModel::verifyLogin();
            error_log('login show me api response: '.print_r($res, 1));
            echo json_encode($res);
            die;
        }
    }

}