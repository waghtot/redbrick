<?php

class Controller
{
    private $actionTemplate;
    private $pageTemplate;
    private $partialTemplate;

    public function getActionTemplate($input)
    {
        $data = new stdClass();
        $data->api = 'template';
        $data->action = 'action';
        $data->actionName = $input;
        $data->projectId = PROJECT;
        $res = json_decode(ApiModel::doAPI($data));
        return $res;

    }

    public function activateAccount($input)
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'CORE';
        $data->procedure = __FUNCTION__;
        $data->params->token = $input;
        $data->params->projectId = PROJECT;
        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function getCountry()
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'CORE';
        $data->procedure = __FUNCTION__;
        $res = json_decode(ApiModel::doAPI($data));
        
        $list = array();
        foreach($res as $key=>$value){
            $list[$value->ISOC] = ucwords(strtolower($value->Name));
        }

        return $list;
    }

    public function getPersonTitle()
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'CORE';
        $data->procedure = __FUNCTION__;
        $res = json_decode(ApiModel::doAPI($data));

        $title = array();
        foreach($res as $key=>$value){
            $title[$value->ID] = ucwords(strtolower($value->Name));
        }

        return $title;
    }

    public function getJobTitle()
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'CORE';
        $data->procedure = __FUNCTION__;
        $data->params->projectId = PROJECT;
        $data->params->language = '826';
        $res = json_decode(ApiModel::doAPI($data));

        $jobtitle = array();
        foreach($res as $key=>$value){
            $jobtitle[$value->ID] = ucwords(strtolower($value->Name));
        }

        return $jobtitle;
    }

    public function getPostData()
    {
        $data = json_decode(file_get_contents('php://input'));
        return $data;

    }

    public function createPerson($input)
    {
        $data = new stdClass();
        $data->api = 'person';
        $data->action = 'Create Person';
        $data->params = $input;
        $data->params->projectId = PROJECT;

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function createPersonUpdate($input)
    {
        $data = new stdClass();
        $data->api = 'person';
        $data->action = 'Update Person';
        $data->params = $input;
        $data->params->projectId = PROJECT;

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function getPerson()
    {
        $data = new stdClass();
        $data->api = 'person';
        $data->action = 'Get Person';
        $data->person = Session::get('user');

        $res = json_decode(ApiModel::doAPI($data));
            if(empty($res)){
                $res = new stdClass();
                $res->button = 'btn-profile';
            }else{
                $res->button = 'btn-profile-update';
            }

        return $res;
    }


    public function createProfile($input)
    {
        $data = new stdClass();
        $data->api = 'profile';
        $data->action = 'Create Profile';
        $data->params = $input;
        $data->params->projectId = PROJECT; 

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function createProfileUpdate($input)
    {
        $data = new stdClass();
        $data->api = 'profile';
        $data->action = 'Update Profile';
        $data->params = $input;
        $data->params->projectId = PROJECT; 

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function getProfile()
    {
        $data = new stdClass();
        $data->api = 'profile';
        $data->action = 'Get Profile';
        $data->person = Session::get('user');

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function getProjectList()
    {
        $data = new stdClass();
        $data->api = 'project';
        $data->action = 'Project List';
        $data->userId = Session::get('user');
        $data->projectId = PROJECT;

        $res = json_decode(ApiModel::doAPI($data));
        return $res;
    }

    public function getStatusName()
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'PROJECTS';
        $data->procedure = __FUNCTION__;
        $res = json_decode(ApiModel::doAPI($data));

        $resObject = array();
        foreach($res as $key=>$value){
            $resObject[$value->id] = ucwords(strtolower($value->name));
        }

        return $resObject;
    }

    public function getProjectDetails($input)
    {
        $data = new stdClass();
        $data->api = 'database';
        $data->connection = 'PROJECTS';
        $data->procedure = __FUNCTION__;
        $data->params->projectId = $input;
        error_log('database response: '.print_r($data, 1));
        $res = json_decode(ApiModel::doAPI($data));
        error_log('database response: '.print_r($res, 1));
        // $resObject = array();
        // foreach($res as $key=>$value){
        //     $resObject[$value->id] = ucwords(strtolower($value->name));
        // }
        // error_log('database response: '.print_r($resObject, 1));
        // return $resObject;        
    }
}