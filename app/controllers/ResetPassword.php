<?php
class Resetpassword 
{
    public function __constract($data = NULL)
    {
        if($data !== NULL){
            return $this->index($data);
        }
    }

    public function index($data)
    {


        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = 'Happy to see you here :)';

        if(isset($data->data['token'])){
            $res = $this->checkToken($data->data['token']);
            if($res->code !=='6000')
            {
                $page->token = false;
                session_destroy();
                header('location: ./');
            }else{
                $page->token = true;
                Session::set('token', $data->data['token']);
                header('location: ./');
            }

        }

        return $page;
    }

    public function setNewPassword()
    {
        if(Definitions::getPostContent()!==false){
            $data = Definitions::getPostContent();
        }else{
            die;
        }

        $data->token = Session::get('token');
        $res = ApiModel::resetPassword($data);
        unset($_SESSION['token']);
        echo json_encode($res[0]);
        die;
    }

    public function checkToken($input){

        $data = new stdClass();
        $data->token = $input;
        $data->action = 'Reset Password';
        return ApiModel::checkToken($data);

    }

}