<?php
class Login extends Controller
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
        $page->template = $this->getActionTemplate($page->view);
        return $page;
    }

    public function loginUser(){

        if(isset($_POST))
        {
            $res = ApiModel::verifyLogin();
            if(isset($res->UserID) && $res->UserID > 0){
                Session::set('user', $res->UserID);
            }
            echo json_encode($res);
            die;
        }
    }

    public function resetPasswordRequest(){
        if(isset($_POST))
        {
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