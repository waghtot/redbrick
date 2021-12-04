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
            $page->details = ProjectModel::getPartialDetails($page->data);
        }

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

    public function createTask()
    {
        $res = ProjectModel::createTask();
        echo json_encode($res);
        die;
    } 

}