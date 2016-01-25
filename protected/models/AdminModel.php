<?php
/**
 *
 * 管理员表
 * @author flynn
 *
 */
class AdminModel extends BaseModel
{
	private $TABLE_NAME = 'admin';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	根据用户名查询用户信息
	 */
	public function getInfoByUsername($username)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("username='{$username}'");
		return $this->getRow($criteria);
	}

	/**
	 *	根据用户ID查询用户信息
	 */
	public function getInfoByUid($uid)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("id={$uid}");
		return $this->getRow($criteria);
	}

	// 查询所有用户 但不包括admin
	public function getAllAdmin()
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("username<>'admin'");
		return $this->getRows($criteria);
	}

	public function upateLastLoginTime($uid, $time)
	{
		$sql = 'update '.$this->TABLE_NAME.' set last_login_time='.$time.' where id='.$uid;
		return $this->queryBySql($sql);
	}

	public function deleteById($uid)
	{
		$sql = 'delete from '.$this->TABLE_NAME.' where id='.$uid;
		return $this->queryBySql($sql);
	}
}
