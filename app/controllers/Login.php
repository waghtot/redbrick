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
            echo json_encode($res);
            die;
        }
    }

    public function resetPasswordRequest(){
        if(isset($_POST))
        {
            error_log('user for verification: '.print_r($_POST, 1));
            $res = ApiModel::checkIfUserExists();
            echo json_encode($res);
            die;
        }
    }

    public function resetPassword(){

        $data = new stdClass();
        $data->code = '6000';
        $data->message = 'Success';
        echo json_encode($data);
        die;
    }

}