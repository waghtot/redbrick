<?php
class Home 
{
    public function __constract($data = NULL)
    {
        return $his->index($data);
    }

    public function index($data)
    {
        error_log('Home controller: '.print_r($data, 1));
        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = 'ala ma kota';
        return $page;
    }
}