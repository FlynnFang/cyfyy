<?php
/**
 * Validator校验器
 */
class Validator
{	
	/**
	 * 校验qq号
	 * 
	 * @param unknown_type $uin
	 */	
	public static function validUin($uin)
	{
		if ($uin && preg_match('/^[1-9]\d{4,16}$/', $uin)) 
		{
			return $uin;
		}
		
		return false;	
	}
	
	/**
	 * 校验微信号
	 * 
	 * @param unknown_type $openId
	 */	
	public static function validOpenId($openId)
	{
		if ($openId && preg_match('/[\w\-]+/i', $openId))
		{
			return $openId;
		}
		
		return false;	
	}

	/**
	 * 校验用户ID
	 * 
	 * @param unknown_type $uid
	 */
	public static function validUid($uid)
	{
		if ($uid && preg_match('/^[1-9]\d*$/', $uid)) 
		{
			return $uid;
		}
		
		return false;	
	}
	
	/**
	 * 校验手机号
	 * 
	 * @param unknown_type $phone
	 */
	public static function validPhone($phone)
	{
		if ($phone && preg_match('/^1[1-8]{1}[0-9]{9}$/', $phone)) 
		{
			return $phone;
		}
		
		return false;	
	}	
	
	/**
	 * 校验URL地址
	 * 
	 * @param unknown_type $url
	 */	
	public static function validUrl($url)
	{
		if ($url && 
			preg_match(
			'/^http[s]?:\/\/'.  
			'(([0-9]{1,3}\.){3}[0-9]{1,3}'. // IP形式的URL- 199.194.52.184  
			'|'. // 允许IP和DOMAIN（域名）  
			'([0-9a-z_!~*\'()-]+\.)*'. // 三级域验证- www.  
			'([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'. // 二级域验证  
			'[a-z]{2,6})'.  // 顶级域验证.com or .museum  
			'(:[0-9]{1,4})?'.  // 端口- :80  
			'((\/\?)|'.  // 如果含有文件对文件部分进行校验  
			'(\/[0-9a-zA-Z_!~\*\'\(\)\.;\?:@&=\+\$,%#-\/]*)?)$/', $url)) 
		{
			return $url;
		}
		
		return false;	
	}
	/**
	 * 
	 * 校验日期
	 * @param unknown_type $str
	 * @param unknown_type $format
	 */
	public static function validDate($str, $format = 'YYYY-MM-DD')
	{		
		if (preg_match('/^\d{4}\-[0-1]\d\-[0-3]\d$/i', $str)) 
		{
			return $str;
		}
		
		return false;
	}

	/**
	 * 
	 * 校验Email
	 * @param unknown_type $str
	 */
	public static function validEmail($str)
	{
		if (preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i', $str))
		{
			return $str;
		}
		
		return false;
	}
}