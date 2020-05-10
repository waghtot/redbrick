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


        if(isset($data->data)){

        }

        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = 'Happy to see you here :)';
        return $page;
    }

    public function checkToken()
    {
        
    }
}