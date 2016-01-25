<?php
/**
 *
 * 既往病史
 * @author flynn
 *
 */
class JwbsModel extends BaseModel
{
	private $TABLE_NAME = 'JWBS';

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

	// public function deleteByCode($code)
	// {
	// 	$condition = "patient_code=:code";
	// 	$params = array(
	// 		':code' => $code,
	// 	);
	// 	return $this->deleteAll($condition,$params);
	// }

}
