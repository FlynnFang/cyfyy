<?php
/**
 *
 * 配置表
 * @author flynn
 *
 */
class ConfigModel extends BaseModel
{
	private $TABLE_NAME = 'config';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	根据类型查询配置信息
	 */
	public function getSetByType($type)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("type='{$type}'");
		$data = $this->getRows($criteria);
		if ($data) {
			$ret = array();;
			foreach($data as $item) {
					$ret[$item['c_key']] = $item['c_value'];
			}
			return $ret;
		}
		return false;
	}

	// 根据类型和code获取一个配置项
	public function getModel($type,$code)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("type='{$type}'");
		$criteria->addCondition("c_key='{$code}'");
		return $this->getRow($criteria);
	}

	// 获取最大的code
	public function getMaxCode($type)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("type='{$type}'");
		$criteria->order = 'c_key desc';
		return $this->getRow($criteria);
	}

}
