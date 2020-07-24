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
        $page->data = $data;
        if(isset($page->data->partial)){
            $data = ProjectModel::getPartialDetails($page->data);
        }
        // error_log('show view: '.print_r($page, 1));
        $page->projects = ProjectModel::getProjectsDetails();

        return $page;
    }

    public function createProject()
    {
        //send data to api-project
        $res = ApiModel::createProject();

    }

    public function getProjectList()
    {
        $data = Controller::getPostData();
        // error_log('type and status: '.print_r($data, 1));
        if(isset($data->type)){
            Session::set('ajax', '1');
            $res = Controller::getProjectList();
            $data = ProjectModel::sortProjects($res, $data->type, $data->value);
        }
        $template = require(PARTIAL.'Project/ProjectLabel.php');
        $template = Session::get('ajax');
        echo json_encode($template);
        Session::kill('ajax');
        die; 
    }

}