<?php

/**
 * 
 * 安全过滤(防止80%的xss, sql注入问题)
 * @author admin
 *
 */
class SecurityFilter
{
	/**
	 * 根据类型对数据进行过滤
	 * 
	 * @param unknown_type $v
	 * @param unknown_type $type
	 */
	public static function typefilter($v, $type = 'ascii')
	{
		$type = strtoupper($type);
		if($type == 'int')
		{
			if(!is_numeric($v)){
				$v = intval($v);
			}
		}
		elseif($type == 'float')
		{
			$v = floatval($v);
		}
		elseif($type == 'ascii')
		{
			$v = preg_replace('/[^0-9a-z\.\-_#&!\$\,]/i', '*', $v);
		}
		else
		{
			return htmlspecialchars($v, ENT_QUOTES);
		}
	
		return $v;
	}
}