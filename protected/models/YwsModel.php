<?php
/**
 *
 * 药物史
 * @author flynn
 *
 */
class YwsModel extends BaseModel
{
	private $TABLE_NAME = 'YWS';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addColumnCondition(array('CODE' => $code, ));
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
	// public function deleteByCode($code)
	// {
	// 	$condition = "patient_code=':code'";
	// 	$params = array(
	// 		':code' => $code,
	// 	);
	// 	return $this->deleteAll($condition,$params);
	// }

}
