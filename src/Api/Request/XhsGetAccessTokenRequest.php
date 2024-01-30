<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;

class XhsGetAccessTokenRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(String, "code")
     */
    private $code;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "code", $this->code);
    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "oauth.getAccessToken";
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}
