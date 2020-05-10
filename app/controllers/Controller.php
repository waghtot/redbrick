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

}