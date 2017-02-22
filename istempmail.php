<?php

if (!function_exists("curl_init")) {
    throw new Exception("IsTempMail API needs the CURL PHP extension.");
}

class IsTempMail
{

    private $token = '';

    const PUBLIC_API = 'https://www.istempmail.com/api-public/check/';
    const PRIVATE_API = 'https://www.istempmail.com/api/check';

    function __construct($token = '')
    {
        if($token) {
            $this->token = $token;
        }
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
        if($this->getToken()) {
            $url = self::PRIVATE_API . $email . '?token' = $this->getToken();
        } else {
            $url = self::PUBLIC_API . $email;
        }

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

        return $jsonObject->blocked;
    }

}