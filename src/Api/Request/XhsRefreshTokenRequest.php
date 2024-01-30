<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;

class XhsRefreshTokenRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(String, "refreshToken")
     */
    private $refreshToken;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "refreshToken", $this->refreshToken);
    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "oauth.refreshToken";
    }

    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }
}
