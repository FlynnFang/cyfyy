<?php
/**
 *
 * 总览
 * @author flynn
 *
 */
class DashboardController extends Admin
{

	public function actionIndex()
	{
		$this->currentMenu = '1000';
		// 获取病历总条数
		// 限制医院权限
		$mHospital = $this->_userInfo['hospital'];
		$shareModel = new ShareModel();
		$shareSet = $shareModel->getTargetSetByCode($mHospital);
		if($shareSet){
			$inArray = array_keys($shareSet);
		}

		$hospitalModel = new ConfigModel();
		$allHos = $hospitalModel->getSetByType(Yii::app()->params['configType']['hospital']);

		$hospitals = $allHos;
		//查询
		$c =  new CDbCriteria();
		if ($this->_userInfo['role'] > 0) {
			$c->addInCondition('hospital', $inArray);
			$hospitals = array();
			foreach ($inArray as $value) {
				$hospitals[$value] = $allHos[$value];
			}
		}
		$hospitalModel = new ConfigModel();
		$hospitals = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		// $patientModel = new PatientModel();
		// //总数
		// $total = $patientModel->count($c);
		// $totals = $patientModel->getPatientGroupTotal();
		// $data = array();
		// if ($totals) {
		// 	foreach ($totals as $value) {
		// 		$item = array();
		// 		$item['value'] = $value['total'];
		// 		$item['label'] = $hospitals[$value['hospital']];
		// 		$item['color'] ='#F7464A';
		// 		$item['highlight'] ='#FF5A5E';
		// 		$data[] = $item;
		// 	}
		// }

		$this->render('index',array('userinfo' => $this->_userInfo, 'total' => $total,'data' => json_encode($data), 'hospitals' => $hospitals));
	}


}
