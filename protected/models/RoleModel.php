<?php
/**
 *
 * 角色表
 * @author flynn
 *
 */
class RoleModel extends BaseModel
{
	private $TABLE_NAME = 'role';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	根据角色ID查询角色信息
	 */
	public function getInfoByCode($roleCode)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("code='{$roleCode}'");
		return $this->getRow($criteria);
	}

}
