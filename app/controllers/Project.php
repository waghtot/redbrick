<?php
class Project extends Controller
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

        $page->projectList = $this->getProjectList();
 
        return $page;
    }
}