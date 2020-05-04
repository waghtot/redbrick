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

}