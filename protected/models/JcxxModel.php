<?php
/**
 *
 * 病人基础信息
 * @author flynn
 *
 */
class JcxxModel extends BaseModel
{
	private $TABLE_NAME = 'JCXX';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	// public function relations()
	// {
	// 	return array(
	// 		'operation'=>array(self::HAS_ONE, 'OperationModel', 'patient_code',),
	// 	);
	// }

	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addColumnCondition(array('CODE' => $code, ));
		return $this->getRow($c);
	}

	public function getMaxPatientCode()
	{
		$c =  new CDbCriteria();
		$c->order = ('CODE desc');
		return $this->getRow($c);
	}

	public function deleteByCode($code)
	{
		$condition = "CODE=:code";
		$params = array(
			':code' => $code,
		);
		return $this->deleteAll($condition,$params);
	}
	//
	// public function getPatientGroupTotal()
	// {
	// 	$sql = "SELECT hospital,count(1) 'total' FROM `patient` GROUP BY `hospital`;";
	// 	$db = Yii::app()->db;
	// 	return $db->createCommand($sql)->queryAll();
	// }


}
