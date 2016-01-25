<?php
/**
 *
 * 登陆页
 * @author flynn
 *
 */
class LoginController extends Admin
{
	public function init()
	{
		$this->_checkAdmin = false;
		$this->layout = "login";

		parent::init();
	}

	public function actionIndex()
	{
		$this->delAdmin();//清cookie

		$this->setPageTitle(Yii::app()->name);
		$this->render('index');
	}

	/**
	 * 验证用户
	 *
	 */
	public function actionLogin()
	{
		//图形验证码
		Yii::import("application.library.Captcha");
		$captcha = new Captcha();
		if (!$captcha->validCaptcha()) {
			$this->_output(-1, "验证码错误");
			//$this->render('index',array('code'=>'-1','message'=>'验证码错误',));
		}

		$username = Yii::app()->request->getPost("username", '');
		$password = Yii::app()->request->getPost("password", '');

		$adminModel = new AdminModel();
		$info = $adminModel->getInfoByUsername($username);
		// var_dump($info);
		// exit;

		if ($info && ($password == $info['password']))
		{
			$adminModel->upateLastLoginTime($info['id'],time());
			$this->setAdmin($info['id']);
			$this->_output(0, "登陆成功");
		}
		else
		{
			$this->_output(-1, "用户名或密码错误");
		}
	}

	/**
	 * 获取图形验证码
	 *
	 */
	public function actionCaptcha()
	{
		Yii::import("application.library.Captcha");
		$captcha = new Captcha();
		$captcha->showImg(78, 37, 4);
	}
}
