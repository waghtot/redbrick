<?php
class Home 
{
    public function __constract($data = NULL)
    {
        return $his->index($data);
    }

    public function index($data)
    {
        $page = new stdClass();
        $page->view = get_called_class();
        $page->data = 'Happy to see you here :)';
        return $page;
    }
}