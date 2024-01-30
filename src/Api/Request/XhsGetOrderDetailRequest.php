<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;

class XhsGetOrderDetailRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(String, "orderId")
     */
    private $orderId;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "orderId", $this->orderId);

    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "order.getOrderDetail";
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }
}
