<?php
/**
 * 
 * 支付
 * @author admin
 *
 */
class Payment
{
	/**
	 * 
	 * 微信支付
	 * @param unknown_type $projectId 登记项目ID(项目方登记)
	 * @param unknown_type $token 网络签名token
	 * @param unknown_type $openId 付款人openId
	 * @param unknown_type $tradeNo 订单编号(项目方生成)
	 * @param unknown_type $tradeBody 订单商品描述
	 * @param unknown_type $fee 金额(分)
	 */
	public static function wx($payUrl, $projectId, $openId, $tradeNo, $tradeBody, $fee, $key)
	{
		$params = array(
			"projectId" => $projectId,
			"openId" => $openId,
			"tradeNo" => $tradeNo,
			"tradeBody" => $tradeBody,
			"fee" => $fee,
		);
		$query = self::formatBizQueryParams($params, true);
    	$sign = self::createSign($params, $key);

    	return "{$payUrl}?{$query}&sign={$sign}";
	}

	/**
	 * 
	 * 参数打包
	 * @param unknown_type $params
	 * @param unknown_type $urlencode
	 */
	public static function formatBizQueryParams($params, $urlencode)
	{		
		//参数打包
		$buff = "";
		ksort($params);
		foreach ($params as $k => $v)
		{
		    if($urlencode)
		    {
			   $v = urlencode($v);
			}
			
			$buff .= $k . "=" . $v . "&";
		}
		
		if (strlen($buff) > 1) 
		{
			$buff = substr($buff, 0, strlen($buff)-1);
		}
		
		return $buff;
	}
		
	/**
	 * 
	 * 生成数据签名(用于校验数据来源正确、数据完整性)
	 * @param unknown_type $params
	 * @param unknown_type $key
	 */
	public static function createSign($params, $key)
	{
		$buf = self::formatBizQueryParams($params, false);

		//加入对称密匙
		$sign = strtoupper(md5($buff."&key=".$key));
		
		return $sign;
	}
}