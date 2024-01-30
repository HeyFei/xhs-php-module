<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;
use LZXhs\PopBaseJsonEntity;

class XhsGetOrderListRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(Integer, "startTime")
     */
    private $startTime;

    /**
     * @JsonProperty(Integer, "endTime")
     */
    private $endTime;

    /**
     * @JsonProperty(Integer, "timeType")
     */
    private $timeType;

    /**
     * @JsonProperty(Integer, "orderType")
     */
    private $orderType;

    /**
     * @JsonProperty(Integer, "orderStatus")
     */
    private $orderStatus;

    /**
     * @JsonProperty(Integer, "pageNo")
     */
    private $pageNo;

    /**
     * @JsonProperty(Integer, "pageSize")
     */
    private $pageSize;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "startTime", $this->startTime);
        $this->setUserParam($params, "endTime", $this->endTime);
        $this->setUserParam($params, "timeType", $this->timeType);
        $this->setUserParam($params, "orderType", $this->orderType);
        $this->setUserParam($params, "orderStatus", $this->orderStatus);
        $this->setUserParam($params, "pageNo", $this->pageNo);
        $this->setUserParam($params, "pageSize", $this->pageSize);
    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "order.getOrderList";
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function setTimeType($timeType)
    {
        $this->timeType = $timeType;
    }

    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }
}
