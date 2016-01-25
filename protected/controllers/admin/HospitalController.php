<?php
/**
 *
 * 医院管理
 * @author flynn
 *
 */
class HospitalController extends Admin
{

	public function init()
	{
			parent::init();
			$this->currentMenu = '1009';
	}

	public function actionIndex()
	{
		$this->actionList();
	}

	public function actionList()
	{
		$hospitalModel = new ConfigModel();
		$list = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$this->setPageTitle('医院列表');
		$this->render('list', array('list'=>$list,));
	}

	public function actionAdd()
	{
		$hospitalModel = new ConfigModel();
		$hospitals = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$this->setPageTitle('新增医院');
		// $this->currentMenu = '1009';
		$this->render('edit',array(
			'hospitals' => $hospitals,
			'op' => 'add',
			));
	}

	public function actionEdit()
	{
		$code = Yii::app()->request->getParam("code", '');
		$op = Yii::app()->request->getParam("op", '');
		if (!$code) {
			// ID不存在
			exit;
		}
		$type = Yii::app()->params['configType']['HOSPITAL'];
		$configModel = new ConfigModel();
		$hospital = $configModel->getModel($type,$code);
		$hospitals = $configModel->getSetByType($type);
		if ($hospitals) {
			unset($hospitals[$code]);
		}
		//分享信息
		$shareModel = new ShareModel();
		$shares = $shareModel->getSetByCode($code);

		$this->setPageTitle($op == 'edit' ? '编辑医院' : '查看医院');
		$this->render('edit',array(
			'hospital' => $hospital,
			'hospitals' => $hospitals,
			'shares' => $shares,
			'op' => $op,
			));
	}

	public function actionUpdate()
	{
		$op = Yii::app()->request->getParam('op', '');
		$id = Yii::app()->request->getPost('id', '');

		$code= Yii::app()->request->getPost("code", '');
		$name = Yii::app()->request->getPost("name", '');

		if (!$name || !$code  ) {
			$this->_output(-1, '参数错误');
		}

		$configModel = new ConfigModel();
		$configModel['type'] = Yii::app()->params['configType']['HOSPITAL'];
		$configModel['c_key'] = $code;
		$configModel['c_value'] = $name;

		$hospitalModel = new ConfigModel();
		$hospitals = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		//共享
		$shares = array();
		$my = new ShareModel();
		$my->setIsNewRecord(1);
		$my['hospital'] = $code;
		$my['target_hospital'] = $code;
		$my['permission'] = join(',',array_keys(Yii::app()->params['permission']));
		$shares[$code] = $my;
		foreach ($hospitals as $key => $value) {
			$permission = Yii::app()->request->getPost('permission_'.$key, '');
			if ($permission) {
				$item = new ShareModel();
				$item->setIsNewRecord(1);
				$item['hospital'] = $code;
				$item['target_hospital'] = $key;
				$item['permission'] = join(',',$permission);
				$shares[$key] = $item;
			}
		}

		//更新
		if ($op == 'edit' && $id && $hospital = $configModel->getModel($configModel['type'],$code)) {
			$configModel['id'] = $hospital['id'];
			$configModel->update();
		}
		// 新增
		if($op == 'add')
		{
			$configModel->setIsNewRecord(1);
			$configModel->save();
		}

		$shareModel = new ShareModel();
		$shareModel->deleteByHospital($code);
		$shareModel->saveMany($shares);

		$this->redirect(Yii::app()->getBaseUrl()."/admin/hospital/list");

	}

	public function actionGetCode()
	{
		$configModel = new ConfigModel();
		$config = $configModel->getMaxCode(Yii::app()->params['configType']['HOSPITAL']);
		$code = 1;
		if ($config) {
			$code = intval($config['c_key'])+1;
		}
		echo  json_encode(array('code' => $code, ));
	}


}
