<?php
/**
 * Utility公用公共类
 */
class Utility
{
	/**
	 * 获取指定长度字符串
	 *
	 * @param unknown_type $length
	 */
	public static function createNonceStr($length = 16)
	{
	    $chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";

	    $str = "";
	    for ($i = 0; $i < $length; $i++)
	    {
	      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	    }

	    return $str;
	}

	/**
	 * 格式化货币
	 *
	 * @param unknown_type $int
	 */
	public static function formatMoney($int)
	{
		return sprintf("%.2f", $int);
	}

    /**************************************************************
     *
     *	使用特定function对数组中所有元素做处理
     *	@param	string	&$array		要处理的字符串
     *	@param	string	$function	要执行的函数
     *	@return boolean	$apply_to_keys_also		是否也应用到key上
     *	@access public
     *
     *************************************************************/
    public static function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
    {
        static $recursive_counter = 0;
        if (++$recursive_counter > 1000) {
            die('possible deep recursion attack');
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                self::arrayRecursive($array[$key], $function, $apply_to_keys_also);
            } else {
                $array[$key] = $function($value);
            }

            if ($apply_to_keys_also && is_string($key)) {
                $new_key = $function($key);
                if ($new_key != $key) {
                    $array[$new_key] = $array[$key];
                    unset($array[$key]);
                }
            }
        }
        $recursive_counter--;
    }

    /**************************************************************
     *
     *	将数组转换为JSON字符串（兼容中文）
     *	@param	array	$array		要转换的数组
     *	@return string		转换得到的json字符串
     *	@access public
     *
     *************************************************************/
    public static function jsonEncode($array)
    {
        self::arrayRecursive($array, 'urlencode', true);
        $json = json_encode($array);
        return urldecode($json);
    }

	/**
	 * 	作用：格式化参数，签名过程需要使用
	 */
	public static function formatBizQueryParaMap($paraMap, $urlencode = false)
	{
		$buff = '';
		ksort($paraMap);
		foreach ($paraMap as $k => $v)
		{
		    if($urlencode)
		    {
			   $v = urlencode($v);
			}
			//$buff .= strtolower($k) . "=" . $v . "&";
			$buff .= $k . "=" . $v . "&";
		}

		$reqPar = '';
		if (strlen($buff) > 0)
		{
			$reqPar = substr($buff, 0, strlen($buff)-1);
		}
		return $reqPar;
	}

	/**
	 * 	作用：array转xml
	 */
	public static function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
        	 if (is_numeric($val))
        	 {
        	 	$xml.="<".$key.">".$val."</".$key.">";

        	 }
        	 else
        	 	$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
        $xml.="</xml>";
        return $xml;
    }

	/**
	 * 	作用：将xml转为array
	 */
	public static function xmlToArray($xml)
	{
        //将XML转为array
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $array_data;
	}

	/**
	 * 	作用：使用证书，以post方式提交xml到对应的接口url
	 */
	public static	function postXmlSSLCurl($xml, $url, $second, $sslCert, $sslKey)
	{
		$ch = curl_init();
		//超时时间
		curl_setopt($ch,CURLOPT_TIMEOUT,$second);
		//这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		//设置header
		curl_setopt($ch,CURLOPT_HEADER,FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		//设置证书
		//使用证书：cert 与 key 分别属于两个.pem文件
		//默认格式为PEM，可以注释
		curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
		curl_setopt($ch,CURLOPT_SSLCERT, $sslCert);
		//默认格式为PEM，可以注释
		curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
		curl_setopt($ch,CURLOPT_SSLKEY, $sslKey);
		//post提交方式
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$xml);
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		}
		else {
			$error = curl_errno($ch);
			echo "curl出错，错误码:$error"."<br>";
			curl_close($ch);
			return false;
		}
	}
}
