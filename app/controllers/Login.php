<?php
class Login extends Controller
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
        $page->data = 'ala ma kota';
        if(Session::get('token')!==false)
        {
            $page->template = $this->getActionTemplate('Reset Password');
        }else{
            $page->template = $this->getActionTemplate($page->view);
        }
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
        $input = json_decode(file_get_contents('php://input'));
        $input->projectId = PROJECT;

        $email = ApiModel::sendEmail($input);
        echo json_encode($email);
        die;
    }
 
}