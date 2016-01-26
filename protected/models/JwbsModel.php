<?php
/**
 *
 * 既往病史
 * @author flynn
 *
 */
class JwbsModel extends CActiveRecord
{
	private $TABLE_NAME = 'JWBS';

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

}
