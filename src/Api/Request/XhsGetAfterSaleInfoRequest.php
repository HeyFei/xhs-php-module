<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;

class XhsGetAfterSaleInfoRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(String, "afterSaleId")
     */
    private $afterSaleId;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "afterSaleId", $this->afterSaleId);
    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "afterSale.getAfterSaleDetail";
    }

    public function setAfterSaleId($afterSaleId)
    {
        $this->afterSaleId = $afterSaleId;
    }
}
