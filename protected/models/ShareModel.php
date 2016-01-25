<?php
/**
 *
 * 病历共享表
 * @author flynn
 *
 */
class ShareModel extends BaseModel
{
	private $TABLE_NAME = 'share';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	获取医院的分享信息
	 */
	public function getSetByCode($code)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("hospital='{$code}'");
		$data = $this->getRows($criteria);
		if ($data) {
			$set = array();
			foreach ($data as $item) {
				$set[$item['target_hospital']] = isset($item['permission']) ? explode(',',$item['permission']) : false;
			}
			return $set;
		}
		return false;
	}

	public function getTargetSetByCode($code)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("target_hospital='{$code}'");
		$data = $this->getRows($criteria);
		if ($data) {
			$set = array();
			foreach ($data as $item) {
				$set[$item['hospital']] = isset($item['permission']) ? explode(',',$item['permission']) : false;
			}
			return $set;
		}
		return false;
	}

	// 一次保存多条记录
	public function saveMany($models)
	{
		$transaction = $this->dbConnection->beginTransaction();
		try {
			foreach ($models as $item) {
				$item->save();
			}
			$transaction->commit();
		} catch (Exception $e) {
			$transaction->rollBack();
		}
	}

	public function deleteByHospital($code)
	{
		$condition = "hospital=:hospital";
		$params = array(':hospital' => $code, );
		return $this->deleteAll($condition,$params);
	}

}
