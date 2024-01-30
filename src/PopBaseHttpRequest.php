<?php

namespace LZXhs;

/**
 * Pop request类
 */
abstract class PopBaseHttpRequest extends PopBaseJsonEntity
{
    private $timestamp;

    public function __construct()
    {
    }

    public function getTimestamp()
    {
        if ($this->timestamp == null) {
            $this->timestamp = time();
        }

        return $this->timestamp;
    }

    public abstract function getVersion();

    public final function getParamsMap()
    {
        $paramsMap = array();
        $paramsMap["version"] = $this->getVersion();
        $paramsMap["method"] = $this->getMethod();
        $paramsMap["timestamp"] = $this->getTimestamp();
        return $paramsMap;
    }

    public final function getReuestParamsMap()
    {
        $paramsMap = array();
        $this->setUserParams($paramsMap);
        return $paramsMap;
    }


    protected abstract function setUserParams(&$var);

    protected final function setUserParam(&$paramMap, $name, $param)
    {
        if (!is_null($param) && $param !== "") {
            if ($this->isPrimaryType($param)) {
                $paramMap[$name] = $param;
            } else {
                $paramMap[$name] = json_encode($param);
            }
        }
    }

    private function isPrimaryType($param)
    {
        if (is_bool($param)) {
            return true;
        } else if (is_integer($param)) {
            return true;
        } else if (is_long($param)) {
            return true;
        } else if (is_float($param)) {
            return true;
        } else if (is_double($param)) {
            return true;
        } else if (is_numeric($param)) {
            return true;
        } else {
            return is_string($param);
        }
    }
}
