<?php
/**
 *
 * 病人基础信息
 * @author flynn
 *
 */
class JcxxModel extends CActiveRecord
{
	private $TABLE_NAME = 'JCXX';

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

	public function getMaxPatientCode()
	{
		$c =  new CDbCriteria();
		$c->order = ('CODE desc');
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
	//
	public function getPatientGroupTotal()
	{
		$sql = "SELECT HOSPITAL,count(1) 'total' FROM `JCXX` GROUP BY `HOSPITAL`;";
		$db = Yii::app()->db;
		return $db->createCommand($sql)->queryAll();
	}


}
