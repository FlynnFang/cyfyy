<?php
/**
 *
 * 实验室检查
 * @author flynn
 *
 */
class SysjcModel extends CActiveRecord
{
	private $TABLE_NAME = 'SYSJC';

	public static function model($className=__CLASS__)
	{
	    return parent::model($className);
	}

	public function tableName()
	{
		return $this->TABLE_NAME;
	}


	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addColumnCondition(array('CODE' => $code, ));
		return $this->find($c);
	}

	public function deleteByCode($code)
	{
		$condition = "CODE=:code";
		$params = array(
			':code' => $code,
		);
		return $this->deleteAll($condition,$params);
	}
	// public function relations()
	// {
	// 	return array(
	// 		'operation'=>array(self::HAS_ONE, 'OperationModel', 'patient_code',),
	// 	);
	// }

	// public function getRowByCode($code)
	// {
	// 	$c =  new CDbCriteria();
	// 	$c->addCondition("patient_code='".$code."'");
	// 	return $this->getRow($c);
	// }
  //
	// public function getMaxPatientCode()
	// {
	// 	$c =  new CDbCriteria();
	// 	$c->order = ('patient_code desc');
	// 	return $this->getRow($c);
	// }
  //
	// public function deleteByCode($code)
	// {
	// 	$condition = "patient_code=:code";
	// 	$params = array(
	// 		':code' => $code,
	// 	);
	// 	return $this->deleteAll($condition,$params);
	// }
  //
	// public function getPatientGroupTotal()
	// {
	// 	$sql = "SELECT hospital,count(1) 'total' FROM `patient` GROUP BY `hospital`;";
	// 	$db = Yii::app()->db;
	// 	return $db->createCommand($sql)->queryAll();
	// }


}
