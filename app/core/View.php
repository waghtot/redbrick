<?php

class View
{
    public function __construct($data = NULL)
    {
        
        require_once 'app/views/template/template.php';

    }

    public function render($data = NULL)
    {

        if(!empty($data)){
            require_once 'app/views/pages/'.ucwords($data->view).'.php';
        }else{
            require_once 'app/views/pages/Home.php';
        }

    }

    public function partial($data)
    {
        echo "view";
        require_once 'app/views/pages/partial/'.ucwords($data->view).'.php';
    }

}