<?php

class Profile extends Controller
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
        $page->country = $this->getCountry();
        $page->title = $this->getPersonTitle();
        $page->jobtitle = $this->getJobTitle();
        $page->person = $this->getPerson();
        $page->profile = $this->getProfile();
        $page->data = 'Hi, that\'s your profile';

        return $page;
    }

    public function userProfile()
    {
        $data = Controller::getPostData();

        $data->person->user = Session::get('user');
        $res = Controller::createPerson($data->person);
        if($res->code !== '6000'){
            echo json_encode($res);
            die;
        }
        unset($res);
        $data->profile->user = Session::get('user');
        $res = Controller::createProfile($data->profile);
        error_log('create profile: '.print_r($res, 1));
        echo json_encode($res);
        die;
    
    }

    public function userProfileUpdate()
    {
        $data = Controller::getPostData();

        $data->person->user = Session::get('user');
        $res = Controller::createPersonUpdate($data->person);
        if($res->code !== '6000'){
            echo json_encode($res);
            die;
        }
        unset($res);

        $data->profile->user = Session::get('user');
        $res = Controller::createProfileUpdate($data->profile);
        error_log('update profile: '.print_r($res, 1));
        echo json_encode($res);
        die;

    }
}