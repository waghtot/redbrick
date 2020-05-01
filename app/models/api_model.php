<?php
class ApiModel
{
    public function doAPI($data){

        $api = PREFIX.$data->api.DNS;
        unset($data->api);
        $postData = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, self::getHeader($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $res = curl_exec($ch);
        if(isset($res)){
            return $res;
        }
        curl_close($ch);

    }
    
    public function verifyLogin()
    {

        $input = json_decode(file_get_contents('php://input'));

        $data = new stdClass();
        $data->api = 'login';
        $data->action = 'Login';
        $data->connection = 'CORE';
        $data->procedure = __FUNCTION__;
        $data->params->login = Definitions::ifEmptyThenNull($input->email);
        $data->params->password = Definitions::ifEmptyThenNull(md5($input->password));
        $data->params->projectId = Definitions::ifEmptyThenNull(PROJECT);
        return self::responseObject(self::doAPI($data));
    }

    public function responseObject($data)
    {
        $resObj = json_decode($data);
        return $resObj;
    }

    public function getHeader($data)
    {
        $signature = base64_encode(hash_hmac('sha256', $data, SIGNATURE, true));
        $header = array('Content-Type:application/json', 'APP-SECURITY-AUTH:'.$signature);
        return $header;
    }
}