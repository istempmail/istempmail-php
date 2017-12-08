<?php

if (!function_exists("curl_init")) {
    throw new Exception("IsTempMail API needs the CURL PHP extension.");
}

class IsTempMail
{
    private $token;

    const API_CHECK = 'https://www.istempmail.com/api/check/';

    function __construct($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public function isDea($email)
    {
        $url = self::API_CHECK . $email . '?token=' . $this->getToken();

        $ch = curl_init($url);
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 60,
        ));

        $response = curl_exec($ch);

        $jsonObject = @json_decode($response);

        if(!$jsonObject) {
            return false;
        }

        if(isset($jsonObject->error)) {
            throw new Exception($jsonObject->error_description);
        }

        return $jsonObject->blocked;
    }

}