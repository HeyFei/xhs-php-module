<?php

namespace LZXhs;

/**
 * Pop接口调用的客户端类
 */
class PopHttpClient
{
    /**
     * SDK版本号
     */
    public static $VERSION = "0.0.1";

    /**
     * 接口超时时间
     */
    private static $SECONDS = "30";

    /**
     * @var string API协议版本号，默认V1
     */
    private $API_VERSION = "V1";

    private $appId;

    private $appSecret;

    private $apiServerUrl = "https://ark.xiaohongshu.com/ark/open_api/v3/common_controller";

    /**
     * 构造函数
     * @param $appId 开放平台分配的appId
     * @param $appSecret 开放平台分配的appSecret
     */
    public function __construct($appId, $appSecret)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    /**
     * 接口调用函数
     * @param $request 是 Array 类型，里面包含API接口名称type（必填）、data_type（返回数据格式选填）和接口其他参数
     * @param $access_token 表示调用接口的授权码
     * @return 接口返回信息
     */
    public function syncInvoke($request, $access_token = "")
    {
        $params = $this->uniqueParams($request);

        $sign = $this->makeSign($params);

        $params['sign'] = $sign;

        if ($access_token) {
            $params['accessToken'] = $access_token;
        }

        $params = json_encode(array_merge($params, $request->getReuestParamsMap()));

        $response = $this->postCurl($params);

        return $response;
    }

    /**
     * 构造全部参数
     * @param $request请求参数 $access_token 授权参数
     * @return 构造后的所有参数
     */
    private function uniqueParams($request)
    {
        $params = $request->getParamsMap();
        $params['appId'] = $this->appId;

        //把boolean转为true 和 false
        foreach ($params as $key => $val) {
            if (is_bool($val)) {
                $params[$key] = $val ? "true" : "false";
            }
        }

        return $params;
    }

    /**
     * @param $request 请求的参数
     * @return 返回md5后的sign值
     */
    private function makeSign($params)
    {
        //参数拼接
        $method = $params['method'] ?? '';
        unset($params['method']);
        //签名步骤一：按字典序排序参数
        ksort($params);
        $string = $method . '?' . http_build_query($params);
        //拼接appSecret
        $string = $string . $this->appSecret;
        //签名步骤三：MD5加密
        $result = md5($string);

        return $result;
    }


    private function postCurl($params)
    {
        $ch = curl_init();
        $curlVersion = curl_version();

        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$SECONDS);

        curl_setopt($ch, CURLOPT_URL, $this->apiServerUrl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);//严格校验
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, false);

        //设置header
        $headers = array(
            "Content-Type:application/json"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        //运行curl
        $raw_response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //返回结果
        if ($raw_response) {
            curl_close($ch);
            $response = new PopHttpResponse();
            $response->setStatusCode($status_code);
            $response->setBody($raw_response);

            return $response;
        } else {
            $error = curl_errno($ch);
            curl_close($ch);
            throw new PopHttpException("curl出错，错误码:$error");
        }
    }

}
