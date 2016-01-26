<?php
/**
 *
 * 药物史
 * @author flynn
 *
 */
class YwsModel extends CActiveRecord
{
	private $TABLE_NAME = 'YWS';

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
	// public function deleteByCode($code)
	// {
	// 	$condition = "patient_code=':code'";
	// 	$params = array(
	// 		':code' => $code,
	// 	);
	// 	return $this->deleteAll($condition,$params);
	// }

}
