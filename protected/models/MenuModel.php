<?php
/**
 *
 * 菜单表
 * @author flynn
 *
 */
class MenuModel extends BaseModel
{
	private $TABLE_NAME = 'menu';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	根据菜单code array 查询菜单
	 */
	public function getInfoByCodes($codes)
	{
		$criteria = new CDbCriteria();
		$criteria->addInCondition("code",$codes);
		$criteria->order = "code";
		return $this->getRows($criteria);
	}

	/**
	 *	根据菜单group array 查询菜单
	 */
	public function getInfoByGroup($groups)
	{
		$criteria = new CDbCriteria();
		$criteria->addInCondition("t.group",$groups);
		$criteria->order = "code";
		return $this->getRows($criteria);
	}

}
