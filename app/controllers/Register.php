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
 
}