<?php

namespace LZXhs\Api\Request;

use LZXhs\PopBaseHttpRequest;

class XhsGetAfterSaleListRequest extends PopBaseHttpRequest
{
    public function __construct()
    {

    }

    /**
     * @JsonProperty(Long, "pageNo")
     */
    private $pageNo;

    /**
     * @JsonProperty(Long, "pageSize")
     */
    private $pageSize;

    /**
     * @JsonProperty(String, "orderId")
     */
    private $orderId;

    /**
     * @JsonProperty(Array, "statuses")
     */
    private $statuses;

    /**
     * @JsonProperty(Array, "returnTypes")
     */
    private $returnTypes;

    /**
     * @JsonProperty(Long, "startTime")
     */
    private $startTime;

    /**
     * @JsonProperty(Long, "endTime")
     */
    private $endTime;

    /**
     * @JsonProperty(Integer, "timeType")
     */
    private $timeType;

    protected function setUserParams(&$params)
    {
        $this->setUserParam($params, "pageNo", $this->pageNo);
        $this->setUserParam($params, "pageSize", $this->pageSize);
        $this->setUserParam($params, "orderId", $this->orderId);
        $this->setUserParam($params, "statuses", $this->statuses);
        $this->setUserParam($params, "returnTypes", $this->returnTypes);
        $this->setUserParam($params, "startTime", $this->startTime);
        $this->setUserParam($params, "endTime", $this->endTime);
        $this->setUserParam($params, "timeType", $this->timeType);
    }

    public function getVersion()
    {
        return '2.0';
    }

    public function getMethod()
    {
        return "afterSale.listAfterSaleApi";
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function setStatuses($statuses)
    {
        $this->statuses = $statuses;
    }

    public function setReturnTypes($returnTypes)
    {
        $this->returnTypes = $returnTypes;
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
}
