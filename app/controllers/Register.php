<?php
class Register extends Controller
{
    public function __constract($data = NULL)
    {
        return $his->index($data);
    }

    public function index($data)
    {
        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = '';
        $page->template = $this->getActionTemplate($page->view);
        return $page;
    }

    public function registerUser(){
        if(Definitions::getPostContent()!==false){
            $data = Definitions::getPostContent();
        }else{
            die;
        }
        $res = ApiModel::checkIfUserExists();
        if($res->code !== '6000'){
            $res = ApiModel::registerUser();
            echo json_encode($res);
            die;
        }else{
            $data = new stdClass();
            $data->code = '6017';
            $data->message = 'User with this email already exists';
            echo json_encode($data);
            die;
        }
        error_log('check if user exists: '.print_r($res, 1));



    }
}