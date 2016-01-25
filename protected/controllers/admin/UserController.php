<?php
/**
 *
 * 用户管理
 * @author flynn
 *
 */
class UserController extends Admin
{

	public function init()
	{
			parent::init();
			$this->currentMenu = '1008';
	}

	public function actionIndex()
	{
		$this->actionList();
	}

	public function actionList()
	{
		$hospitalModel = new ConfigModel();
		$hospitals = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$userModel = new AdminModel();
		$list = $userModel->getAllAdmin();

		$this->setPageTitle('用户管理');
		$this->render('list', array('list'=>$list, 'hospitals' =>$hospitals));
	}

	public function actionAdd()
	{
		$configModel = new ConfigModel();
		$hospitals = $configModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);


		$this->setPageTitle('新增用户');
		$this->currentMenu = '1008';
		$this->render('edit',array(
			'hospitals' => $hospitals,
			'op' => 'add',
			));
	}

	public function actionEdit()
	{
		$id = Yii::app()->request->getParam("id", '');
		$op = Yii::app()->request->getParam("op", '');
		if (!$id) {
			// ID不存在
			exit;
		}

		$adminModel = new AdminModel();
		$user = $adminModel->getById($id);

		$configModel = new ConfigModel();
		$hospitals = $configModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$this->setPageTitle('编辑用户');
		$this->render('edit',array(
			'user' => $user,
			'hospitals' => $hospitals,
			'op' => 'edit',
			));
	}

	public function actionUpdate()
	{
		$op = Yii::app()->request->getParam('op', '');
		$id = Yii::app()->request->getPost('id', '');

		$username= Yii::app()->request->getPost("username", '');
		$password = Yii::app()->request->getPost("password", '');
		$hospital = Yii::app()->request->getPost("hospital",'');
		$role= Yii::app()->request->getPost("role", '');

		if (!$username || !$password  ) {
			$this->_output(-1, '参数错误');
		}

		$userModel = new AdminModel();
		$userModel['username'] = $username;
		$userModel['password'] = $password;
		$userModel['hospital'] = $hospital;
		$userModel['role'] = $role;
		$userModel['create_time'] = time();


		//更新
		if ($op == 'edit' && $id && $user = $userModel->getById($id)) {
			$userModel['id'] = $user['id'];
			$userModel->update();
		}
		// 新增
		if($op == 'add')
		{
			$userModel->setIsNewRecord(1);
			$userModel->save();
		}

		$this->redirect(Yii::app()->getBaseUrl()."/admin/user/list");

	}

	public function actionDel()
	{
		$id = Yii::app()->request->getParam('id', 0);
		if ($id <= 1 ) {
			$this->redirect(Yii::app()->getBaseUrl()."/admin/user/list");
			exit;
		}
		$userModel = new AdminModel();
		$userModel->deleteById($id);
		$this->redirect(Yii::app()->getBaseUrl()."/admin/user/list");
	}


}
