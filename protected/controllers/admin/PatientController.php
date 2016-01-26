<?php
/**
 *
 * 病人
 * @author flynn
 *
 */
class PatientController extends Admin
{

	public function init()
	{
			parent::init();
			$this->currentMenu = '1001';
	}

	public function actionIndex()
	{
		$this->actionList();

	}

	public function actionList()
	{
		//参数
		$name = Yii::app()->request->getParam("name", '');
		$hospital = Yii::app()->request->getParam("hospital", '');
		$page = Yii::app()->request->getParam("page", 1);

		// 限制医院权限
		$mHospital = $this->_userInfo['hospital'];
		$shareModel = new ShareModel();
		$shareSet = $shareModel->getTargetSetByCode($mHospital);
		$inArray = array();
		if($shareSet){
			$inArray = array_keys($shareSet);
		}


		$hospitalModel = new ConfigModel();
		$allHos = $hospitalModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$hospitals = $allHos;
		//查询
		$c =  new CDbCriteria();
		if ($this->_userInfo['role'] > 0) {
			$c->addInCondition('HOSPITAL', $inArray);
			$hospitals = array();
			foreach ($inArray as $value) {
				$hospitals[$value] = $allHos[$value];
			}
		}

		if ($name) {
			$c->addSearchCondition('NAME',$name);
		}
		if ($hospital) {
			$c->addCondition('HOSPITAL='.$hospital);
		}

		//分页
		$start = ($page - 1) * $this->_pagesize;

		$jcxxModel = new JcxxModel();
		//总数
		$total = $jcxxModel->count($c);

		//分页
		$pages = new CPagination($total);
		$pages->pageSize = Yii::app()->params['paginavtion']['pagesize'];
		$pages->route = '/admin/patient/list';
		$pages->applyLimit($c);

		$c->order = "create_time desc";

		$list = $jcxxModel->findAll($c);
		// var_dump($list);
		// exit;
		// var_dump($list, $total);exit;
		$this->setPageTitle('病例列表');
		$this->render('list', array('list'=>$list, 'pages'=>$pages, 'hospitals' =>$hospitals,'shareSet'=>$shareSet));
	}

	/**
	 * 新增病历
	 */
	public function actionAdd()
	{
		$configModel = new ConfigModel();
		$ZJLX = $configModel->getSetByType(Yii::app()->params['configType']['ZJLX']);
		$XL = $configModel->getSetByType(Yii::app()->params['configType']['XL']);
		$XYS = $configModel->getSetByType(Yii::app()->params['configType']['XYS']);
		$YJS = $configModel->getSetByType(Yii::app()->params['configType']['YJS']);
		$WLLX = $configModel->getSetByType(Yii::app()->params['configType']['YJS']);
		$ZZLX = $configModel->getSetByType(Yii::app()->params['configType']['ZZLX']);
		$TYYY = $configModel->getSetByType(Yii::app()->params['configType']['TYYY']);
		$ZSYKNY = $configModel->getSetByType(Yii::app()->params['configType']['ZSYKNY']);
		$ZSYKNY_JL = $configModel->getSetByType(Yii::app()->params['configType']['ZSYKNY_JL']);
		$KFKNY = $configModel->getSetByType(Yii::app()->params['configType']['KFKNY']);
		$KFKNYZZ = $configModel->getSetByType(Yii::app()->params['configType']['KFKNYZZ']);
		$TTLYY = $configModel->getSetByType(Yii::app()->params['configType']['TTLYY']);
		$JYYY  = $configModel->getSetByType(Yii::app()->params['configType']['JYYY']);
		$GMBW  = $configModel->getSetByType(Yii::app()->params['configType']['GMBW']);
		$XX  = $configModel->getSetByType(Yii::app()->params['configType']['XX']);
		$CYZD  = $configModel->getSetByType(Yii::app()->params['configType']['CYZD']);
		$CYDY  = $configModel->getSetByType(Yii::app()->params['configType']['CYDY']);
		$XSBY  = $configModel->getSetByType(Yii::app()->params['configType']['XSBY']);
		$XSLX  = $configModel->getSetByType(Yii::app()->params['configType']['XSLX']);
		$XS = $configModel->getSetByType(Yii::app()->params['configType']['XS']);
		$XGN = $configModel->getSetByType(Yii::app()->params['configType']['XGN']);
		$KILLIP = $configModel->getSetByType(Yii::app()->params['configType']['KILLIP']);
		$XGBW = $configModel->getSetByType(Yii::app()->params['configType']['XGBW']);
		$XGLX  = $configModel->getSetByType(Yii::app()->params['configType']['XGLX']);
		$GMBW  = $configModel->getSetByType(Yii::app()->params['configType']['GMBW']);
		$SPLX  = $configModel->getSetByType(Yii::app()->params['configType']['SPLX']);
		$ZRQBQYY  = $configModel->getSetByType(Yii::app()->params['configType']['ZRQBQYY']);
		$QBQLX  = $configModel->getSetByType(Yii::app()->params['configType']['QBQLX']);
		$SWFS  = $configModel->getSetByType(Yii::app()->params['configType']['SWFS']);
		$ZZSS  = $configModel->getSetByType(Yii::app()->params['configType']['XSLX']);
		$HOSPITAL  = $configModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$this->setPageTitle('新增病例');
		$this->currentMenu = '1011';
		$this->render('edit',array(
			'have' => Yii::app()->params['have'],
			'boolean' => Yii::app()->params['boolean'],
			'notquite' => Yii::app()->params['notquite'],
			'sex' => Yii::app()->params['sex'],
			'cx' => Yii::app()->params['cx'],
			'alive' => Yii::app()->params['alive'],
			'stop' => Yii::app()->params['stop'],
			'fhl' => Yii::app()->params['fhl'],
			'ZJLX'=>$ZJLX,
			'XL'=>$XL,
			'XYS'=>$XYS,
			'YJS'=>$YJS,
			'WLLX'=>$WLLX,
			'ZZLX'=>$ZZLX,
			'TYYY'=>$TYYY,
			'ZSYKNY'=>$ZSYKNY,
			'ZSYKNY_JL'=>$ZSYKNY_JL,
			'KFKNY'=>$KFKNY,
			'KFKNYZZ'=>$KFKNYZZ,
			'TTLYY'=>$TTLYY,
			'JYYY'=>$JYYY,
			'GMBW'=>$GMBW,
			'XX'=>$XX,
			'CYZD'=>$CYZD,
			'CYDY'=>$CYDY,
			'XSBY'=>$XSBY,
			'XSLX'=>$XSLX,
			'XS'=>$XS,
			'XGN'=>$XGN,
			'KILLIP'=>$KILLIP,
			'XGBW'=>$XGBW,
			'XGLX'=>$XGLX,
			'SPLX'=>$SPLX,
			'ZRQBQYY'=>$ZRQBQYY,
			'QBQLX'=>$QBQLX,
			'SWFS'=>$SWFS,
			'ZZSS'=>$ZZSS,
			'HOSPITAL'=>$HOSPITAL,
			'op' => 'add',
			));
	}

	/**
	 * 编辑病历
	 */
	public function actionEdit()
	{
		$patient_code = Yii::app()->request->getParam("code", '');
		$op = Yii::app()->request->getParam("op", '');
		if (!$patient_code) {
			// ID不存在
			exit;
		}

		$jcxxModel = new JcxxModel();
		$jwbsModel = new JwbsModel();
		$ywsModel = new YwsModel();
		$sysjcModel = new SysjcModel();
		$zyqkModel = new ZyqkModel();
		$dbzModel = new DbzModel();
		$sfzdsjModel = new SfzdsjModel();

		$patient = $jcxxModel->getRowByCode($patient_code);
		$jwbs = $jwbsModel->getRowByCode($patient_code);
		$yws = $ywsModel->getRowByCode($patient_code);
		$sysjc = $sysjcModel->getRowByCode($patient_code);
		$zyqk = $zyqkModel->getRowByCode($patient_code);
		$dbz = $dbzModel->getRowByCode($patient_code);
		$sfzdsj = $sfzdsjModel->getRowByCode($patient_code);

		if ($jwbs) {
			$jwbs['XYS_N'] = explode(',',$jwbs['XYS_N']);
			$jwbs['XYS_ZT'] = explode(',',$jwbs['XYS_ZT']);
		}
		if ($yws) {
			$yws['ASPL_ZYQJ_WYHTYYY'] = explode(',',$yws['ASPL_ZYQJ_WYHTYYY']);
			$yws['ASPL_ZYQJ_HYTY_YY'] = explode(',',$yws['ASPL_ZYQJ_HYTY_YY']);
			$yws['LBGL_ZYQJ_WYHTYYY'] = explode(',',$yws['LBGL_ZYQJ_WYHTYYY']);
			$yws['LBGL_ZYQJ_HYTY_YY'] = explode(',',$yws['LBGL_ZYQJ_HYTY_YY']);
			$yws['ZSYKNYW_YWMC'] = explode(',',$yws['ZSYKNYW_YWMC']);
			$yws['KFKNY_ZYQJ_YWZL'] = explode(',',$yws['KFKNY_ZYQJ_YWZL']);
			$yws['KFKNY_ZYQJ_ZZ'] = explode(',',$yws['KFKNY_ZYQJ_ZZ']);
			$yws['TTLYW_FHYW'] = explode(',',$yws['TTLYW_FHYW']);
			$yws['JYYW_OPTION'] = explode(',',$yws['JYYW_OPTION']);
		}
		if ($zyqk) {
			$zyqk['CYDY_OPTION'] = explode(',',$zyqk['CYDY_OPTION']);
		}
		if ($dbz) {
			$dbz['XG_BW'] = explode(',',$dbz['XG_BW']);
		}

		$configModel = new ConfigModel();
		$ZJLX = $configModel->getSetByType(Yii::app()->params['configType']['ZJLX']);
		$XL = $configModel->getSetByType(Yii::app()->params['configType']['XL']);
		$XYS = $configModel->getSetByType(Yii::app()->params['configType']['XYS']);
		$YJS = $configModel->getSetByType(Yii::app()->params['configType']['YJS']);
		$WLLX = $configModel->getSetByType(Yii::app()->params['configType']['YJS']);
		$ZZLX = $configModel->getSetByType(Yii::app()->params['configType']['ZZLX']);
		$TYYY = $configModel->getSetByType(Yii::app()->params['configType']['TYYY']);
		$ZSYKNY = $configModel->getSetByType(Yii::app()->params['configType']['ZSYKNY']);
		$ZSYKNY_JL = $configModel->getSetByType(Yii::app()->params['configType']['ZSYKNY_JL']);
		$KFKNY = $configModel->getSetByType(Yii::app()->params['configType']['KFKNY']);
		$KFKNYZZ = $configModel->getSetByType(Yii::app()->params['configType']['KFKNYZZ']);
		$TTLYY = $configModel->getSetByType(Yii::app()->params['configType']['TTLYY']);
		$JYYY  = $configModel->getSetByType(Yii::app()->params['configType']['JYYY']);
		$GMBW  = $configModel->getSetByType(Yii::app()->params['configType']['GMBW']);
		$XX  = $configModel->getSetByType(Yii::app()->params['configType']['XX']);
		$CYZD  = $configModel->getSetByType(Yii::app()->params['configType']['CYZD']);
		$CYDY  = $configModel->getSetByType(Yii::app()->params['configType']['CYDY']);
		$XSBY  = $configModel->getSetByType(Yii::app()->params['configType']['XSBY']);
		$XSLX  = $configModel->getSetByType(Yii::app()->params['configType']['XSLX']);
		$XS = $configModel->getSetByType(Yii::app()->params['configType']['XS']);
		$XGN = $configModel->getSetByType(Yii::app()->params['configType']['XGN']);
		$KILLIP = $configModel->getSetByType(Yii::app()->params['configType']['KILLIP']);
		$XGBW = $configModel->getSetByType(Yii::app()->params['configType']['XGBW']);
		$XGLX  = $configModel->getSetByType(Yii::app()->params['configType']['XGLX']);
		$GMBW  = $configModel->getSetByType(Yii::app()->params['configType']['GMBW']);
		$SPLX  = $configModel->getSetByType(Yii::app()->params['configType']['SPLX']);
		$ZRQBQYY  = $configModel->getSetByType(Yii::app()->params['configType']['ZRQBQYY']);
		$QBQLX  = $configModel->getSetByType(Yii::app()->params['configType']['QBQLX']);
		$SWFS  = $configModel->getSetByType(Yii::app()->params['configType']['SWFS']);
		$ZZSS  = $configModel->getSetByType(Yii::app()->params['configType']['XSLX']);
		$HOSPITAL  = $configModel->getSetByType(Yii::app()->params['configType']['HOSPITAL']);

		$this->setPageTitle($op=='view'? '查看病历':'编辑病历');
		$this->render('edit',array(
			'jcxx' => $patient,
			'jwbs' => $jwbs,
			'yws' => $yws,
			'sysjc' => $sysjc,
			'zyqk' => $zyqk,
			'dbz' => $dbz,
			'sfzdsj' => $sfzdsj,
			'have' => Yii::app()->params['have'],
			'boolean' => Yii::app()->params['boolean'],
			'notquite' => Yii::app()->params['notquite'],
			'sex' => Yii::app()->params['sex'],
			'cx' => Yii::app()->params['cx'],
			'alive' => Yii::app()->params['alive'],
			'stop' => Yii::app()->params['stop'],
			'fhl' => Yii::app()->params['fhl'],
			'ZJLX'=>$ZJLX,
			'XL'=>$XL,
			'XYS'=>$XYS,
			'YJS'=>$YJS,
			'WLLX'=>$WLLX,
			'ZZLX'=>$ZZLX,
			'TYYY'=>$TYYY,
			'ZSYKNY'=>$ZSYKNY,
			'ZSYKNY_JL'=>$ZSYKNY_JL,
			'KFKNY'=>$KFKNY,
			'KFKNYZZ'=>$KFKNYZZ,
			'TTLYY'=>$TTLYY,
			'JYYY'=>$JYYY,
			'GMBW'=>$GMBW,
			'XX'=>$XX,
			'CYZD'=>$CYZD,
			'CYDY'=>$CYDY,
			'XSBY'=>$XSBY,
			'XSLX'=>$XSLX,
			'XS'=>$XS,
			'XGN'=>$XGN,
			'KILLIP'=>$KILLIP,
			'XGBW'=>$XGBW,
			'XGLX'=>$XGLX,
			'SPLX'=>$SPLX,
			'ZRQBQYY'=>$ZRQBQYY,
			'QBQLX'=>$QBQLX,
			'SWFS'=>$SWFS,
			'ZZSS'=>$ZZSS,
			'HOSPITAL'=>$HOSPITAL,
			'op' => $op,
			));
	}

	/**
	 * 更新病历
	 */
	public function actionUpdate()
	{
		$op = Yii::app()->request->getParam('op', '');
		$code = Yii::app()->request->getPost('CODE', '');

		// 基础信息
		$NAME= Yii::app()->request->getPost("NAME", '');
		$HOSPITAL = Yii::app()->request->getPost("HOSPITAL");
		$ZJLX = Yii::app()->request->getPost("ZJLX",'');
		$ZJHM = Yii::app()->request->getPost("ZJHM", '');
		$ZYH = Yii::app()->request->getPost("ZYH", '');
		$RYSJ = Yii::app()->request->getPost("RYSJ", '');
		$CYSJ = Yii::app()->request->getPost("CYSJ", '');
		$SFRQ = Yii::app()->request->getPost('SFRQ');
		$SEX = Yii::app()->request->getPost('SEX', '');
		$AGE = Yii::app()->request->getPost('AGE', '');
		$HEIGHT = Yii::app()->request->getPost('HEIGHT');
		$WEIGHT = Yii::app()->request->getPost('WEIGHT');
		$BMI = Yii::app()->request->getPost('BMI');
		$TEL1 = Yii::app()->request->getPost('TEL1');
		$TEL2 = Yii::app()->request->getPost('TEL2');
		$HOME_ADDR = Yii::app()->request->getPost('HOME_ADDR');
		$COMPANY_ADDR = Yii::app()->request->getPost('COMPANY_ADDR');
		$XL = Yii::app()->request->getPost('XL');

		// 既往病史
		$XYS_OPTION = Yii::app()->request->getPost('XYS_OPTION');
		$XYS_N = Yii::app()->request->getPost('XYS_N', ''); //数组
		$XYS_ZT = Yii::app()->request->getPost('XYS_ZT'); //数组
		$YJS_OPTION = Yii::app()->request->getPost('YJS_OPTION', 0);
		$YJS_N = Yii::app()->request->getPost('YJS_N', 0);
		$YJS_PT = Yii::app()->request->getPost('YJS_PT', 0);
		$YJSFDH_OPTION = Yii::app()->request->getPost('YJSFDH_OPTION', 0);
		$GXY_OPTION = Yii::app()->request->getPost('GXY_OPTION', 0);
		$GXY_HBNS = Yii::app()->request->getPost('GXY_HBNS', 0);
		$GXY_ZL_OPTION = Yii::app()->request->getPost('GXY_ZL_OPTION', 0);
		$GXY_ZLYW = Yii::app()->request->getPost('GXY_ZLYW', 0);
		$TLB_OPTION = Yii::app()->request->getPost('TLB_OPTION', 0);
		$TLB_HBNS = Yii::app()->request->getPost('TLB_HBNS', 0);
		$TLB_ZL_OPTION = Yii::app()->request->getPost('TLB_ZL_OPTION', 0.0);
		$TLB_ZLYW = Yii::app()->request->getPost('TLB_ZLYW', 0.0);
		$ZDXWL_OPTION = Yii::app()->request->getPost('ZDXWL_OPTION', 0.0);
		$ZDXWL_LX = Yii::app()->request->getPost('ZDXWL_LX', 0.0);
		$ZDXWL_HBN = Yii::app()->request->getPost('ZDXWL_HBN', 0.0);
		$ZDXWL_ZL_OPTION = Yii::app()->request->getPost('ZDXWL_ZL_OPTION', 0.0);
		$ZDXWL_YW = Yii::app()->request->getPost('ZDXWL_YW', 0);
		$FC_OPTION = Yii::app()->request->getPost('FC_OPTION', 0);
		$FC_HBN = Yii::app()->request->getPost('FC_HBN', 0);
		$FC_ZL_OPTION = Yii::app()->request->getPost('FC_ZL_OPTION', 0);
		$FC_YW = Yii::app()->request->getPost('FC_YW', 0);
		$DZXNQXFZ_OPTION = Yii::app()->request->getPost('DZXNQXFZ_OPTION', 0);
		$ZZ_OPTION = Yii::app()->request->getPost('ZZ_OPTION', 0);
		$ZZ_LX = Yii::app()->request->getPost('ZZ_LX', 0);
		$WZXGB_OPTION = Yii::app()->request->getPost('WZXGB_OPTION', 0);
		$XJGS_OPTION = Yii::app()->request->getPost('XJGS_OPTION', 0);
		$MXSGNBQ_OPTION = Yii::app()->request->getPost('MXSGNBQ_OPTION', 0);
		$MXZSXFBJB_OPTION = Yii::app()->request->getPost('MXZSXFBJB_OPTION', 0);
		$XHDCX_OPTION = Yii::app()->request->getPost('XHDCX_OPTION', '');
		$XLSJ_OPTION = Yii::app()->request->getPost('XLSJ_OPTION', 0);
		$JWGMJRZL_OPTION = Yii::app()->request->getPost('JWGMJRZL_OPTION', '');
		$JWGMJRZL_BW = Yii::app()->request->getPost('JWGMJRZL_BW', '');
		$JWGMDQZL_OPTION = Yii::app()->request->getPost('JWGMDQZL_OPTION', '');

		//	药物史
		$ASPL_JWFY_OPTION = Yii::app()->request->getPost('ASPL_JWFY_OPTION', '');
		$ASPL_ZYQJ_OPTION = Yii::app()->request->getPost('ASPL_ZYQJ_OPTION', 0);
		$ASPL_ZYQJ_WCL = Yii::app()->request->getPost('ASPL_ZYQJ_WCL', 0);
		$ASPL_ZYQJ_WYHTYYY = Yii::app()->request->getPost('ASPL_ZYQJ_WYHTYYY', '');
		$ASPL_ZYQJ_HYTY_FY = Yii::app()->request->getPost('ASPL_ZYQJ_HYTY_FY', '');
		$ASPL_ZYQJ_HYTY_YY = Yii::app()->request->getPost('ASPL_ZYQJ_HYTY_YY', 0);
		$LBGL_JWFY_OPTION = Yii::app()->request->getPost('LBGL_JWFY_OPTION', 0);
		$LBGL_ZYQJ_OPTION = Yii::app()->request->getPost('LBGL_ZYQJ_OPTION', 0);
		$LBGL_ZYQJ_WCL = Yii::app()->request->getPost('LBGL_ZYQJ_WCL', 0);
		$LBGL_ZYQJ_WYHTYYY = Yii::app()->request->getPost('LBGL_ZYQJ_WYHTYYY', 0);
		$LBGL_ZYQJ_HYTY_FY = Yii::app()->request->getPost('LBGL_ZYQJ_HYTY_FY', '');
		$LBGL_ZYQJ_HYTY_YY = Yii::app()->request->getPost('LBGL_ZYQJ_HYTY_YY', '');
		$ZSYKNYW_OPTION = Yii::app()->request->getPost('ZSYKNYW_OPTION', 0);
		$ZSYKNYW_YWMC = Yii::app()->request->getPost('ZSYKNYW_YWMC', 0);
		$ZSYKNYW_JL = Yii::app()->request->getPost('ZSYKNYW_JL', 0);
		$ZSYKNYW_YYCXSJ = Yii::app()->request->getPost('ZSYKNYW_YYCXSJ', 0);
		$KFKNY_JWFY_OPTION = Yii::app()->request->getPost('KFKNY_JWFY_OPTION', '');
		$KFKNY_ZYQJ_OPTION = Yii::app()->request->getPost('KFKNY_ZYQJ_OPTION', '');
		$KFKNY_ZYQJ_YWZL = Yii::app()->request->getPost('KFKNY_ZYQJ_YWZL', '');
		$KFKNY_ZYQJ_ZZ = Yii::app()->request->getPost('KFKNY_ZYQJ_ZZ', 0);
		$KFKNY_ZYQJ_INR = Yii::app()->request->getPost('KFKNY_ZYQJ_INR', 0);
		$TTLYW_OPTION = Yii::app()->request->getPost('TTLYW_OPTION', 0);
		$TTLYW_FHYW = Yii::app()->request->getPost('TTLYW_FHYW', 0);
		$TTLYW_WCL = Yii::app()->request->getPost('TTLYW_WCL', '');
		$JYYW_OPTION = Yii::app()->request->getPost('JYYW_OPTION', '');
		$QT_XSZLYW_JWFY_OPTION = Yii::app()->request->getPost('QT_XSZLYW_JWFY_OPTION', 0);
		$QT_XSZLYW_ZYQJ_OPTION = Yii::app()->request->getPost('QT_XSZLYW_ZYQJ_OPTION', 0);
		$QT_XSZLYW_MC = Yii::app()->request->getPost('QT_XSZLYW_MC', 0);
		$QT_KXLSCYW_JWFY_OPTION = Yii::app()->request->getPost('QT_KXLSCYW_JWFY_OPTION', 0);
		$QT_KXLSCYW_ZYQJ_OPTION = Yii::app()->request->getPost('QT_KXLSCYW_ZYQJ_OPTION', '');
		$QT_KXLSCYW_MC = Yii::app()->request->getPost('QT_KXLSCYW_MC', '');
		$QT_QGTJKJ_JWFY_OPTION = Yii::app()->request->getPost('QT_QGTJKJ_JWFY_OPTION', '');
		$QT_QGTJKJ_ZYQJ_OPTION = Yii::app()->request->getPost('QT_QGTJKJ_ZYQJ_OPTION', '');
		$QT_QGTJKJ_MC = Yii::app()->request->getPost('QT_QGTJKJ_MC', 0);
		$QT_LLJ_JWFY_OPTION = Yii::app()->request->getPost('QT_LLJ_JWFY_OPTION', 0);
		$QT_LLJ_ZYQJ_OPTION = Yii::app()->request->getPost('QT_LLJ_ZYQJ_OPTION', '');
		$QT_LLJ__MC = Yii::app()->request->getPost('QT_LLJ__MC', '');
		$QT_WSYZJ_JWFY_OPTION = Yii::app()->request->getPost('QT_WSYZJ_JWFY_OPTION', 0);
		$QT_WSYZJ_ZYQJ_OPTION = Yii::app()->request->getPost('QT_WSYZJ_ZYQJ_OPTION', 0);
		$QT_WSYZJ_MC = Yii::app()->request->getPost('QT_WSYZJ_MC', 0);

		// 实验室 检查
		$XCG_XX = Yii::app()->request->getPost('XCG_XX', 0);
		$XCG_WBC = Yii::app()->request->getPost('XCG_WBC', ''); //数组
		$XCG_NEUT = Yii::app()->request->getPost('XCG_NEUT'); //数组
		$XCG_HGB = Yii::app()->request->getPost('XCG_HGB', 0);
		$XCG_LYM = Yii::app()->request->getPost('XCG_LYM', 0);
		$XCG_PLT = Yii::app()->request->getPost('XCG_PLT', 0);
		$XCG_HCT = Yii::app()->request->getPost('XCG_HCT', 0);
		$XSH_CRP = Yii::app()->request->getPost('XSH_CRP', 0);
		$XSH_AST = Yii::app()->request->getPost('XSH_AST', 0);
		$XSH_ALT = Yii::app()->request->getPost('XSH_ALT', 0);
		$XSH_TBIL = Yii::app()->request->getPost('XSH_TBIL', 0);
		$XSH_DBIL = Yii::app()->request->getPost('XSH_DBIL', 0);
		$XSH_UA = Yii::app()->request->getPost('XSH_UA', 0);
		$XSH_BUN = Yii::app()->request->getPost('XSH_BUN', 0.0);
		$XSH_CR = Yii::app()->request->getPost('XSH_CR', 0.0);
		$XSH_GYS = Yii::app()->request->getPost('XSH_GYS', 0.0);
		$XSH_TG = Yii::app()->request->getPost('XSH_TG', 0.0);
		$XSH_HDLC = Yii::app()->request->getPost('XSH_HDLC', 0.0);
		$XSH_LDLC = Yii::app()->request->getPost('XSH_LDLC', 0.0);
		$XSH_ZDGC = Yii::app()->request->getPost('XSH_ZDGC', 0);
		$QTSHZB_ALB = Yii::app()->request->getPost('QTSHZB_ALB', 0);
		$QTSHZB_THXHDB = Yii::app()->request->getPost('QTSHZB_THXHDB', 0);
		$QTSHZB_XT = Yii::app()->request->getPost('QTSHZB_XT', 0);
		$QTSHZB_DEJT = Yii::app()->request->getPost('QTSHZB_DEJT', 0);
		$QTSHZB_FDP = Yii::app()->request->getPost('QTSHZB_FDP', 0);
		$QTSHZB_XC = Yii::app()->request->getPost('QTSHZB_XC', 0);
		$DJZ_K = Yii::app()->request->getPost('DJZ_K', 0);
		$DJZ_NA = Yii::app()->request->getPost('DJZ_NA', 0);
		$JG_FT3 = Yii::app()->request->getPost('JG_FT3', 0);
		$JG_TT3 = Yii::app()->request->getPost('JG_TT3', 0);
		$JG_TSH = Yii::app()->request->getPost('JG_TSH', 0);
		$N_NWLBDB = Yii::app()->request->getPost('N_NWLBDB', '');
		$N_NDB = Yii::app()->request->getPost('N_NDB', 0);
		$DBYX_DBYXSFYX = Yii::app()->request->getPost('DBYX_DBYXSFYX', '');
		$XJSSBZW_CKMB = Yii::app()->request->getPost('XJSSBZW_CKMB', '');
		$XJSSBZW_TNT = Yii::app()->request->getPost('XJSSBZW_TNT', 0);
		$XJSSBZW_TNI = Yii::app()->request->getPost('XJSSBZW_TNI', 0);
		$XSZB_BNP = Yii::app()->request->getPost('XSZB_BNP', '');
		$XZCC_LVEF = Yii::app()->request->getPost('XZCC_LVEF', '');
		$XZCC_ZSSZMNJZ = Yii::app()->request->getPost('XZCC_ZSSZMNJZ', 0);
		$XZCC_YS = Yii::app()->request->getPost('XZCC_YS', 0);
		$XZCC_ZF = Yii::app()->request->getPost('XZCC_ZF', 0);
		$XZCC_YF = Yii::app()->request->getPost('XZCC_YF', 0);
		$XZCC_FS = Yii::app()->request->getPost('XZCC_FS', 0);
		$XZCC_FDMSSY = Yii::app()->request->getPost('XZCC_FDMSSY', '');

		//住院情况
		$RYTZ_XY_SSY = Yii::app()->request->getPost('RYTZ_XY_SSY', '');
		$RYTZ_XY_SZY = Yii::app()->request->getPost('RYTZ_XY_SZY', 0);
		$RYTZ_XL_JXXL = Yii::app()->request->getPost('RYTZ_XL_JXXL', 0);
		$RYTZ_XL_FC_OPTION = Yii::app()->request->getPost('RYTZ_XL_FC_OPTION', 0);
		$CYZT_OPTION = Yii::app()->request->getPost('CYZT_OPTION', 0);
		$ZYTS = Yii::app()->request->getPost('ZYTS', '');
		$CYZD_OPTION = Yii::app()->request->getPost('CYZD_OPTION', '');
		$CYZD_QT = Yii::app()->request->getPost('CYZD_QT', '');
		$CYDY_OPTION = Yii::app()->request->getPost('CYDY_OPTION', 0);
		$CYDY_MC = Yii::app()->request->getPost('CYDY_MC', 0);
		$CYDY_YF = Yii::app()->request->getPost('CYDY_YF', 0);
		$CYDY_SFQJYWBH = Yii::app()->request->getPost('CYDY_SFQJYWBH', 0);

		// 单病种
		$XS_BY_OPTION = Yii::app()->request->getPost('XS_BY_OPTION', '');
		$XS_BY_QT = Yii::app()->request->getPost('XS_BY_QT', '');
		$XS_LX_OPTION = Yii::app()->request->getPost('XS_LX_OPTION', 0);
		$XS_OPTION = Yii::app()->request->getPost('XS_OPTION', 0);
		$XS_XGN_OPTION = Yii::app()->request->getPost('XS_XGN_OPTION', 0);
		$XS_YWSY_LNJ_OPTION = Yii::app()->request->getPost('XS_YWSY_LNJ_OPTION', 0);
		$XS_YWSY_B_OPTION = Yii::app()->request->getPost('XS_YWSY_B_OPTION', '');
		$XS_YWSY_ACEI_OPTION = Yii::app()->request->getPost('XS_YWSY_ACEI_OPTION', '');
		$XS_YWSY_LNZ_OPTION = Yii::app()->request->getPost('XS_YWSY_LNZ_OPTION', '');
		$XS_YWSY_DGX_OPTION = Yii::app()->request->getPost('XS_YWSY_DGX_OPTION', '');
		$XS_YWSY_GLZJKJ_OPTION = Yii::app()->request->getPost('XS_YWSY_GLZJKJ_OPTION', '');
		$XG_KILLIP_OPTION = Yii::app()->request->getPost('XG_KILLIP_OPTION', 0);
		$XG_BW = Yii::app()->request->getPost('XG_BW', 0);
		$XG_LX = Yii::app()->request->getPost('XG_LX', 0);
		$XG_SFJZJRZL_OPTION = Yii::app()->request->getPost('XG_SFJZJRZL_OPTION', 0);
		$XG_MZSJ = Yii::app()->request->getPost('XG_MZSJ', '');
		$XG_FMC = Yii::app()->request->getPost('XG_FMC', '');
		$XG_SS_LM_CD = Yii::app()->request->getPost('XG_SS_LM_CD', '');
		$XG_SS_LM_ZJLX = Yii::app()->request->getPost('XG_SS_LM_ZJLX', '');
		$XG_SS_LM_DX = Yii::app()->request->getPost('XG_SS_LM_DX', '');
		$XG_SS_LAD_CD = Yii::app()->request->getPost('XG_SS_LAD_CD', 0);
		$XG_SS_LAD_ZJLX = Yii::app()->request->getPost('XG_SS_LAD_ZJLX', 0);
		$XG_SS_LAD_DX = Yii::app()->request->getPost('XG_SS_LAD_DX', 0);
		$XG_SS_RCA_CD = Yii::app()->request->getPost('XG_SS_RCA_CD', 0);
		$XG_SS_RCA_ZJLX = Yii::app()->request->getPost('XG_SS_RCA_ZJLX', '');
		$XG_SS_RCA_DX = Yii::app()->request->getPost('XG_SS_RCA_DX', '');
		$XG_SS_LCX_CD = Yii::app()->request->getPost('XG_SS_LCX_CD', '');
		$XG_SS_LCX_ZJLX = Yii::app()->request->getPost('XG_SS_LCX_ZJLX', '');
		$XG_SS_LCX_DX = Yii::app()->request->getPost('XG_SS_LCX_DX', '');
		$XG_SS_DIA_CD = Yii::app()->request->getPost('XG_SS_DIA_CD', 0);
		$XG_SS_DIA_ZJLX = Yii::app()->request->getPost('XG_SS_DIA_ZJLX', 0);
		$XG_SS_DIA_DX = Yii::app()->request->getPost('XG_SS_DIA_DX', 0);
		$XG_SS_OM_CD = Yii::app()->request->getPost('XG_SS_OM_CD', 0);
		$XG_SS_OM_ZJLX = Yii::app()->request->getPost('XG_SS_OM_ZJLX', '');
		$XG_SS_OM_DX = Yii::app()->request->getPost('XG_SS_OM_DX', '');
		$XG_SS_PDA_CD = Yii::app()->request->getPost('XG_SS_PDA_CD', '');
		$XG_SS_PDA_ZJLX = Yii::app()->request->getPost('XG_SS_PDA_ZJLX', 0);
		$XG_SS_PDA_DX = Yii::app()->request->getPost('XG_SS_PDA_DX', 0);
		$XG_SS_PLA_CD = Yii::app()->request->getPost('XG_SS_PLA_CD', 0);
		$XG_SS_PLA_ZJLX = Yii::app()->request->getPost('XG_SS_PLA_ZJLX', '');
		$XG_SS_PLA_DX = Yii::app()->request->getPost('XG_SS_PLA_DX', '');
		$XG_SS_QT_TEXT = Yii::app()->request->getPost('XG_SS_QT_TEXT', '');
		$XG_SS_QT_CD = Yii::app()->request->getPost('XG_SS_QT_CD', 0);
		$XG_SS_QT_ZJLX = Yii::app()->request->getPost('XG_SS_QT_ZJLX', 0);
		$XG_SS_QT_DX = Yii::app()->request->getPost('XG_SS_QT_DX', 0);
		$SP_LX_OPTION = Yii::app()->request->getPost('SP_LX_OPTION', '');
		$SP_SSSJ = Yii::app()->request->getPost('SP_SSSJ', '');
		$SP_SSFF_OPTION = Yii::app()->request->getPost('SP_SSFF_OPTION', '');
		$SP_YYWC_OPTION = Yii::app()->request->getPost('SP_YYWC_OPTION', 0);
		$SP_YYWC_YW = Yii::app()->request->getPost('SP_YYWC_YW', 0);
		$QBQ_ZRYY_OPTION = Yii::app()->request->getPost('QBQ_ZRYY_OPTION', 0);
		$QBQ_LX_OPTION = Yii::app()->request->getPost('QBQ_LX_OPTION', '');
		$QBQ_SSSJ = Yii::app()->request->getPost('QBQ_SSSJ', '');
		$QBQ_CQSFYY = Yii::app()->request->getPost('QBQ_CQSFYY', '');
		$QBQ_XLSCYY = Yii::app()->request->getPost('QBQ_XLSCYY', 0);
		$QBQ_SFQJ_YJFZ_OPTION = Yii::app()->request->getPost('QBQ_SFQJ_YJFZ_OPTION', 0);
		$QBQ_SFQJ_ICD_OPTION = Yii::app()->request->getPost('QBQ_SFQJ_ICD_OPTION', 0);
		$QBQ_SFQJ_GNYC_OPTION = Yii::app()->request->getPost('QBQ_SFQJ_GNYC_OPTION', '');
		$QBQ_SFQJ_SFGZ_OPTION = Yii::app()->request->getPost('QBQ_SFQJ_SFGZ_OPTION', '');

		//随访终点事件
		$SW_OPTION = Yii::app()->request->getPost('SW_OPTION', '');
		$SW_YY_OPTION = Yii::app()->request->getPost('SW_YY_OPTION', '');
		$ZZ_OPTION = Yii::app()->request->getPost('ZZ_OPTION', 0);
		$ZZ_YY_OPTION = Yii::app()->request->getPost('ZZ_YY_OPTION', 0);
		$XS_OPTION = Yii::app()->request->getPost('XS_OPTION', 0);
		$CX_OPTION = Yii::app()->request->getPost('CX_OPTION', '');
		$CX_LX_OPTION = Yii::app()->request->getPost('CX_LX_OPTION', '');
		$CX_BW = Yii::app()->request->getPost('CX_BW', '');
		$CX_SFSX_OPTION = Yii::app()->request->getPost('CX_SFSX_OPTION', '');
		$XJGS_OPTION = Yii::app()->request->getPost('XJGS_OPTION', 0);
		$ZZY_OPTION = Yii::app()->request->getPost('ZZY_OPTION', 0);
		$ZZY_ZYCS = Yii::app()->request->getPost('ZZY_ZYCS', 0);
		$XLSC_OPTION = Yii::app()->request->getPost('XLSC_OPTION', '');


		if (!$NAME || !$ZJHM) {
			$this->_output(-1, '参数错误');
		}

		$jcxxModel = new JcxxModel();

		$jcxxModel['HOSPITAL'] = $this->_userInfo['hospital'];
		$jcxxModel['NAME'] = $NAME;
		$jcxxModel['ZJLX'] = $ZJLX;
		$jcxxModel['ZJHM'] = $ZJHM;
		$jcxxModel['ZYH'] = $ZYH;
		$jcxxModel['RYSJ'] = $RYSJ;
		$jcxxModel['CYSJ'] = $CYSJ;
		$jcxxModel['SFRQ'] = $SFRQ;
		$jcxxModel['SEX'] = $SEX;
		$jcxxModel['AGE'] = $AGE;
		$jcxxModel['HEIGHT'] = $HEIGHT;
		$jcxxModel['WEIGHT'] = $WEIGHT;
		$jcxxModel['BMI'] = $HEIGHT > 0 ? $WEIGHT/pow($HEIGHT/100,2) : 0;//体重(公斤) / 身高2(米2)
		$jcxxModel['TEL1'] = $TEL1;
		$jcxxModel['TEL2'] = $TEL2;
		$jcxxModel['HOME_ADDR'] = $HOME_ADDR;
		$jcxxModel['COMPANY_ADDR'] = $COMPANY_ADDR;
		$jcxxModel['XL'] = $XL;
		$jcxxModel['CREATE_TIME'] = time();

		$jwbsModel = new JwbsModel();

		$jwbsModel['XYS_OPTION'] = $XYS_OPTION;
		$jwbsModel['XYS_N'] = $XYS_N;
		$jwbsModel['XYS_ZT'] = $XYS_ZT;
		$jwbsModel['YJS_OPTION'] = $YJS_OPTION;
		$jwbsModel['YJS_N'] = $YJS_N;
		$jwbsModel['YJS_PT'] = $YJS_PT;
		$jwbsModel['YJSFDH_OPTION'] = $YJSFDH_OPTION;
		$jwbsModel['GXY_OPTION'] = $GXY_OPTION;
		$jwbsModel['GXY_HBNS'] = $GXY_HBNS;
		$jwbsModel['GXY_ZL_OPTION'] = $GXY_ZL_OPTION;
		$jwbsModel['GXY_ZLYW'] = $GXY_ZLYW;
		$jwbsModel['TLB_OPTION'] = $TLB_OPTION;
		$jwbsModel['TLB_HBNS'] = $TLB_HBNS;
		$jwbsModel['TLB_ZL_OPTION'] = $TLB_ZL_OPTION;
		$jwbsModel['TLB_ZLYW'] = $TLB_ZLYW;
		$jwbsModel['ZDXWL_OPTION'] = $ZDXWL_OPTION;
		$jwbsModel['ZDXWL_LX'] = $ZDXWL_LX;
		$jwbsModel['ZDXWL_HBN'] = $ZDXWL_HBN;
		$jwbsModel['ZDXWL_ZL_OPTION'] = $ZDXWL_ZL_OPTION;
		$jwbsModel['ZDXWL_YW'] = $ZDXWL_YW;
		$jwbsModel['FC_OPTION'] = $FC_OPTION;
		$jwbsModel['FC_HBN'] = $FC_HBN;
		$jwbsModel['FC_ZL_OPTION'] = $FC_ZL_OPTION;
		$jwbsModel['FC_YW'] = $FC_YW;
		$jwbsModel['DZXNQXFZ_OPTION'] = $DZXNQXFZ_OPTION;
		$jwbsModel['ZZ_OPTION'] = $ZZ_OPTION;
		$jwbsModel['ZZ_LX'] = $ZZ_LX;
		$jwbsModel['WZXGB_OPTION'] = $WZXGB_OPTION;
		$jwbsModel['XJGS_OPTION'] = $XJGS_OPTION;
		$jwbsModel['MXSGNBQ_OPTION'] = $MXSGNBQ_OPTION;
		$jwbsModel['MXZSXFBJB_OPTION'] = $MXZSXFBJB_OPTION;
		$jwbsModel['XHDCX_OPTION'] = $XHDCX_OPTION;
		$jwbsModel['XLSJ_OPTION'] = $XLSJ_OPTION;
		$jwbsModel['JWGMJRZL_OPTION'] = $JWGMJRZL_OPTION;
		$jwbsModel['JWGMJRZL_BW'] = $JWGMJRZL_BW;
		$jwbsModel['JWGMDQZL_OPTION'] = $JWGMDQZL_OPTION;
		$jwbsModel['CREATE_TIME'] = time();


		$ywsModel = new YwsModel();

		$ywsModel['ASPL_JWFY_OPTION'] = $ASPL_JWFY_OPTION;
		$ywsModel['ASPL_ZYQJ_OPTION'] = $ASPL_ZYQJ_OPTION;
		$ywsModel['ASPL_ZYQJ_WCL'] = $ASPL_ZYQJ_WCL;
		$ywsModel['ASPL_ZYQJ_WYHTYYY'] = $ASPL_ZYQJ_WYHTYYY ? join(',',$ASPL_ZYQJ_WYHTYYY) : '';
		$ywsModel['ASPL_ZYQJ_HYTY_FY'] = $ASPL_ZYQJ_HYTY_FY;
		$ywsModel['ASPL_ZYQJ_HYTY_YY'] = $ASPL_ZYQJ_HYTY_YY ? join(',',$ASPL_ZYQJ_HYTY_YY) : '';
		$ywsModel['LBGL_JWFY_OPTION'] = $LBGL_JWFY_OPTION;
		$ywsModel['LBGL_ZYQJ_OPTION'] = $LBGL_ZYQJ_OPTION;
		$ywsModel['LBGL_ZYQJ_WCL'] = $LBGL_ZYQJ_WCL;
		$ywsModel['LBGL_ZYQJ_WYHTYYY'] = $LBGL_ZYQJ_WYHTYYY ? join(',',$LBGL_ZYQJ_WYHTYYY) : '';
		$ywsModel['LBGL_ZYQJ_HYTY_FY'] = $LBGL_ZYQJ_HYTY_FY;
		$ywsModel['LBGL_ZYQJ_HYTY_YY'] = $LBGL_ZYQJ_HYTY_YY ? join(',',$LBGL_ZYQJ_HYTY_YY) : '';
		$ywsModel['ZSYKNYW_OPTION'] = $ZSYKNYW_OPTION;
		$ywsModel['ZSYKNYW_YWMC'] = $ZSYKNYW_YWMC ? join(',',$ZSYKNYW_YWMC) : '';
		$ywsModel['ZSYKNYW_JL'] = $ZSYKNYW_JL;
		$ywsModel['ZSYKNYW_YYCXSJ'] = $ZSYKNYW_YYCXSJ;
		$ywsModel['KFKNY_JWFY_OPTION'] = $KFKNY_JWFY_OPTION;
		$ywsModel['KFKNY_ZYQJ_OPTION'] = $KFKNY_ZYQJ_OPTION;
		$ywsModel['KFKNY_ZYQJ_YWZL'] = $KFKNY_ZYQJ_YWZL ? join(',',$KFKNY_ZYQJ_YWZL) : '';
		$ywsModel['KFKNY_ZYQJ_ZZ'] = $KFKNY_ZYQJ_ZZ ? join(',',$KFKNY_ZYQJ_ZZ) : '';
		$ywsModel['KFKNY_ZYQJ_INR'] = $KFKNY_ZYQJ_INR;
		$ywsModel['TTLYW_OPTION'] = $TTLYW_OPTION;
		$ywsModel['TTLYW_FHYW'] = $TTLYW_FHYW ? join(',',$TTLYW_FHYW) : '' ;
		$ywsModel['TTLYW_WCL'] = $TTLYW_WCL;
		$ywsModel['JYYW_OPTION'] = $JYYW_OPTION ? join(',',$JYYW_OPTION) : '';
		$ywsModel['QT_XSZLYW_JWFY_OPTION'] = $QT_XSZLYW_JWFY_OPTION;
		$ywsModel['QT_XSZLYW_ZYQJ_OPTION'] = $QT_XSZLYW_ZYQJ_OPTION;
		$ywsModel['QT_XSZLYW_MC'] = $QT_XSZLYW_MC;
		$ywsModel['QT_KXLSCYW_JWFY_OPTION'] = $QT_KXLSCYW_JWFY_OPTION;
		$ywsModel['QT_KXLSCYW_ZYQJ_OPTION'] = $QT_KXLSCYW_ZYQJ_OPTION;
		$ywsModel['QT_KXLSCYW_MC'] = $QT_KXLSCYW_MC;
		$ywsModel['QT_QGTJKJ_JWFY_OPTION'] = $QT_QGTJKJ_JWFY_OPTION;
		$ywsModel['QT_QGTJKJ_ZYQJ_OPTION'] = $QT_QGTJKJ_ZYQJ_OPTION;
		$ywsModel['QT_QGTJKJ_MC'] = $QT_QGTJKJ_MC;
		$ywsModel['QT_LLJ_JWFY_OPTION'] = $QT_LLJ_JWFY_OPTION;
		$ywsModel['QT_LLJ_ZYQJ_OPTION'] = $QT_LLJ_ZYQJ_OPTION;
		$ywsModel['QT_LLJ__MC'] = $QT_LLJ__MC;
		$ywsModel['QT_WSYZJ_JWFY_OPTION'] = $QT_WSYZJ_JWFY_OPTION;
		$ywsModel['QT_WSYZJ_ZYQJ_OPTION'] = $QT_WSYZJ_ZYQJ_OPTION;
		$ywsModel['QT_WSYZJ_MC'] = $QT_WSYZJ_MC;
		$ywsModel['CREATE_TIME'] = time();

		$sysjcModel = new SysjcModel();

		$sysjcModel['XCG_XX'] = $XCG_XX;
		$sysjcModel['XCG_WBC'] = $XCG_WBC;
		$sysjcModel['XCG_NEUT'] = $XCG_NEUT;
		$sysjcModel['XCG_HGB'] = $XCG_HGB;
		$sysjcModel['XCG_LYM'] = $XCG_LYM;
		$sysjcModel['XCG_PLT'] = $XCG_PLT;
		$sysjcModel['XCG_HCT'] = $XCG_HCT;
		$sysjcModel['XSH_CRP'] = $XSH_CRP;
		$sysjcModel['XSH_AST'] = $XSH_AST;
		$sysjcModel['XSH_ALT'] = $XSH_ALT;
		$sysjcModel['XSH_TBIL'] = $XSH_TBIL;
		$sysjcModel['XSH_DBIL'] = $XSH_DBIL;
		$sysjcModel['XSH_UA'] = $XSH_UA;
		$sysjcModel['XSH_BUN'] = $XSH_BUN;
		$sysjcModel['XSH_CR'] = $XSH_CR;
		$sysjcModel['XSH_GYS'] = $XSH_GYS;
		$sysjcModel['XSH_TG'] = $XSH_TG;
		$sysjcModel['XSH_HDLC'] = $XSH_HDLC;
		$sysjcModel['XSH_LDLC'] = $XSH_LDLC;
		$sysjcModel['XSH_ZDGC'] = $XSH_ZDGC;
		$sysjcModel['QTSHZB_ALB'] = $QTSHZB_ALB;
		$sysjcModel['QTSHZB_THXHDB'] = $QTSHZB_THXHDB;
		$sysjcModel['QTSHZB_XT'] = $QTSHZB_XT;
		$sysjcModel['QTSHZB_DEJT'] = $QTSHZB_DEJT;
		$sysjcModel['QTSHZB_FDP'] = $QTSHZB_FDP;
		$sysjcModel['QTSHZB_XC'] = $QTSHZB_XC;
		$sysjcModel['DJZ_K'] = $DJZ_K;
		$sysjcModel['DJZ_NA'] = $DJZ_NA;
		$sysjcModel['JG_FT3'] = $JG_FT3;
		$sysjcModel['JG_TT3'] = $JG_TT3;
		$sysjcModel['JG_TSH'] = $JG_TSH;
		$sysjcModel['N_NWLBDB'] = $N_NWLBDB;
		$sysjcModel['N_NDB'] = $N_NDB;
		$sysjcModel['DBYX_DBYXSFYX'] = $DBYX_DBYXSFYX;
		$sysjcModel['XJSSBZW_CKMB'] = $XJSSBZW_CKMB;
		$sysjcModel['XJSSBZW_TNT'] = $XJSSBZW_TNT;
		$sysjcModel['XJSSBZW_TNI'] = $XJSSBZW_TNI;
		$sysjcModel['XSZB_BNP'] = $XSZB_BNP;
		$sysjcModel['XZCC_LVEF'] = $XZCC_LVEF;
		$sysjcModel['XZCC_ZSSZMNJZ'] = $XZCC_ZSSZMNJZ;
		$sysjcModel['XZCC_YS'] = $XZCC_YS;
		$sysjcModel['XZCC_ZF'] = $XZCC_ZF;
		$sysjcModel['XZCC_YF'] = $XZCC_YF;
		$sysjcModel['XZCC_FS'] = $XZCC_FS;
		$sysjcModel['XZCC_FDMSSY'] = $XZCC_FDMSSY;
		$sysjcModel['CREATE_TIME'] = time();


		$zyqkModel = new ZyqkModel();

		$zyqkModel['RYTZ_XY_SSY'] = $RYTZ_XY_SSY;
		$zyqkModel['RYTZ_XY_SZY'] = $RYTZ_XY_SZY;
		$zyqkModel['RYTZ_XL_JXXL'] = $RYTZ_XL_JXXL;
		$zyqkModel['RYTZ_XL_FC_OPTION'] = $RYTZ_XL_FC_OPTION;
		$zyqkModel['CYZT_OPTION'] = $CYZT_OPTION;
		$zyqkModel['ZYTS'] = $ZYTS;
		$zyqkModel['CYZD_OPTION'] = $CYZD_OPTION;
		$zyqkModel['CYZD_QT'] = $CYZD_QT;
		$zyqkModel['CYDY_OPTION'] = $CYDY_OPTION ? join(',',$CYDY_OPTION) : '';
		$zyqkModel['CYDY_MC'] = $CYDY_MC;
		$zyqkModel['CYDY_YF'] = $CYDY_YF;
		$zyqkModel['CYDY_SFQJYWBH'] = $CYDY_SFQJYWBH;
		$zyqkModel['CREATE_TIME'] = time();

		$dbzModel = new DbzModel();

		$dbzModel['XS_BY_OPTION'] = $XS_BY_OPTION;
		$dbzModel['XS_BY_QT'] = $XS_BY_QT;
		$dbzModel['XS_LX_OPTION'] = $XS_LX_OPTION;
		$dbzModel['XS_OPTION'] = $XS_OPTION;
		$dbzModel['XS_XGN_OPTION'] = $XS_XGN_OPTION;
		$dbzModel['XS_YWSY_LNJ_OPTION'] = $XS_YWSY_LNJ_OPTION;
		$dbzModel['XS_YWSY_B_OPTION'] = $XS_YWSY_B_OPTION;
		$dbzModel['XS_YWSY_ACEI_OPTION'] = $XS_YWSY_ACEI_OPTION;
		$dbzModel['XS_YWSY_LNZ_OPTION'] = $XS_YWSY_LNZ_OPTION;
		$dbzModel['XS_YWSY_DGX_OPTION'] = $XS_YWSY_DGX_OPTION;
		$dbzModel['XS_YWSY_GLZJKJ_OPTION'] = $XS_YWSY_GLZJKJ_OPTION;
		$dbzModel['XG_KILLIP_OPTION'] = $XG_KILLIP_OPTION;
		$dbzModel['XG_BW'] = $XG_BW ? join(',',$XG_BW) : '';
		$dbzModel['XG_LX'] = $XG_LX;
		$dbzModel['XG_SFJZJRZL_OPTION'] = $XG_SFJZJRZL_OPTION;
		$dbzModel['XG_MZSJ'] = $XG_MZSJ;
		$dbzModel['XG_FMC'] = $XG_FMC;
		$dbzModel['XG_SS_LM_CD'] = $XG_SS_LM_CD;
		$dbzModel['XG_SS_LM_ZJLX'] = $XG_SS_LM_ZJLX;
		$dbzModel['XG_SS_LM_DX'] = $XG_SS_LM_DX;
		$dbzModel['XG_SS_LAD_CD'] = $XG_SS_LAD_CD;
		$dbzModel['XG_SS_LAD_ZJLX'] = $XG_SS_LAD_ZJLX;
		$dbzModel['XG_SS_LAD_DX'] = $XG_SS_LAD_DX;
		$dbzModel['XG_SS_RCA_CD'] = $XG_SS_RCA_CD;
		$dbzModel['XG_SS_RCA_ZJLX'] = $XG_SS_RCA_ZJLX;
		$dbzModel['XG_SS_RCA_DX'] = $XG_SS_RCA_DX;
		$dbzModel['XG_SS_LCX_CD'] = $XG_SS_LCX_CD;
		$dbzModel['XG_SS_LCX_ZJLX'] = $XG_SS_LCX_ZJLX;
		$dbzModel['XG_SS_LCX_DX'] = $XG_SS_LCX_DX;
		$dbzModel['XG_SS_DIA_CD'] = $XG_SS_DIA_CD;
		$dbzModel['XG_SS_DIA_ZJLX'] = $XG_SS_DIA_ZJLX;
		$dbzModel['XG_SS_DIA_DX'] = $XG_SS_DIA_DX;
		$dbzModel['XG_SS_OM_CD'] = $XG_SS_OM_CD;
		$dbzModel['XG_SS_OM_ZJLX'] = $XG_SS_OM_ZJLX;
		$dbzModel['XG_SS_OM_DX'] = $XG_SS_OM_DX;
		$dbzModel['XG_SS_PDA_CD'] = $XG_SS_PDA_CD;
		$dbzModel['XG_SS_PDA_ZJLX'] = $XG_SS_PDA_ZJLX;
		$dbzModel['XG_SS_PDA_DX'] = $XG_SS_PDA_DX;
		$dbzModel['XG_SS_PLA_CD'] = $XG_SS_PLA_CD;
		$dbzModel['XG_SS_PLA_ZJLX'] = $XG_SS_PLA_ZJLX;
		$dbzModel['XG_SS_PLA_DX'] = $XG_SS_PLA_DX;
		$dbzModel['XG_SS_QT_TEXT'] = $XG_SS_QT_TEXT;
		$dbzModel['XG_SS_QT_CD'] = $XG_SS_QT_CD;
		$dbzModel['XG_SS_QT_ZJLX'] = $XG_SS_QT_ZJLX;
		$dbzModel['XG_SS_QT_DX'] = $XG_SS_QT_DX;
		$dbzModel['SP_LX_OPTION'] = $SP_LX_OPTION;
		$dbzModel['SP_SSSJ'] = $SP_SSSJ;
		$dbzModel['SP_SSFF_OPTION'] = $SP_SSFF_OPTION;
		$dbzModel['SP_YYWC_OPTION'] = $SP_YYWC_OPTION;
		$dbzModel['SP_YYWC_YW'] = $SP_YYWC_YW;
		$dbzModel['QBQ_ZRYY_OPTION'] = $QBQ_ZRYY_OPTION;
		$dbzModel['QBQ_LX_OPTION'] = $QBQ_LX_OPTION;
		$dbzModel['QBQ_SSSJ'] = $QBQ_SSSJ;
		$dbzModel['QBQ_CQSFYY'] = $QBQ_CQSFYY;
		$dbzModel['QBQ_XLSCYY'] = $QBQ_XLSCYY;
		$dbzModel['QBQ_SFQJ_YJFZ_OPTION'] = $QBQ_SFQJ_YJFZ_OPTION;
		$dbzModel['QBQ_SFQJ_ICD_OPTION'] = $QBQ_SFQJ_ICD_OPTION;
		$dbzModel['QBQ_SFQJ_GNYC_OPTION'] = $QBQ_SFQJ_GNYC_OPTION;
		$dbzModel['QBQ_SFQJ_SFGZ_OPTION'] = $QBQ_SFQJ_SFGZ_OPTION;
		$dbzModel['CREATE_TIME'] = time();


		$sfzdsjModel = new SfzdsjModel();

		$sfzdsjModel['SW_OPTION'] = $SW_OPTION;
		$sfzdsjModel['SW_YY_OPTION'] = $SW_YY_OPTION;
		$sfzdsjModel['ZZ_OPTION'] = $ZZ_OPTION;
		$sfzdsjModel['ZZ_YY_OPTION'] = $ZZ_YY_OPTION;
		$sfzdsjModel['XS_OPTION'] = $XS_OPTION;
		$sfzdsjModel['CX_OPTION'] = $CX_OPTION;
		$sfzdsjModel['CX_LX_OPTION'] = $CX_LX_OPTION;
		$sfzdsjModel['CX_BW'] = $CX_BW;
		$sfzdsjModel['CX_SFSX_OPTION'] = $CX_SFSX_OPTION;
		$sfzdsjModel['XJGS_OPTION'] = $XJGS_OPTION;
		$sfzdsjModel['ZZY_OPTION'] = $ZZY_OPTION;
		$sfzdsjModel['ZZY_ZYCS'] = $ZZY_ZYCS;
		$sfzdsjModel['XLSC_OPTION'] = $XLSC_OPTION;
		$sfzdsjModel['CREATE_TIME'] = time();


		//更新
		if ($op == 'edit' && $code && $jcxx = $jcxxModel->getRowByCode($code)) {
			if(!$jcxx){
				$this->_output(-1, '该条数据不存在');
			}

			$transaction = Yii::app()->db->beginTransaction();
			try {
				$jcxx['NAME'] = $NAME;
				$jcxx['ZJLX'] = $ZJLX;
				$jcxx['ZJHM'] = $ZJHM;
				$jcxx['ZYH'] = $ZYH;
				$jcxx['RYSJ'] = $RYSJ;
				$jcxx['CYSJ'] = $CYSJ;
				$jcxx['SFRQ'] = $SFRQ;
				$jcxx['SEX'] = $SEX;
				$jcxx['AGE'] = $AGE;
				$jcxx['HEIGHT'] = $HEIGHT;
				$jcxx['WEIGHT'] = $WEIGHT;
				$jcxx['BMI'] = $HEIGHT > 0 ? $WEIGHT/pow($HEIGHT/100,2) : 0;//体重(公斤) / 身高2(米2)
				$jcxx['TEL1'] = $TEL1;
				$jcxx['TEL2'] = $TEL2;
				$jcxx['HOME_ADDR'] = $HOME_ADDR;
				$jcxx['COMPANY_ADDR'] = $COMPANY_ADDR;
				$jcxx['XL'] = $XL;
				$jcxx->update();

				if ($jwbs = $jwbsModel->getRowByCode($code))
				{
					$jwbs['XYS_OPTION'] = $XYS_OPTION;
					$jwbs['XYS_N'] = $XYS_N;
					$jwbs['XYS_ZT'] = $XYS_ZT;
					$jwbs['YJS_OPTION'] = $YJS_OPTION;
					$jwbs['YJS_N'] = $YJS_N;
					$jwbs['YJS_PT'] = $YJS_PT;
					$jwbs['YJSFDH_OPTION'] = $YJSFDH_OPTION;
					$jwbs['GXY_OPTION'] = $GXY_OPTION;
					$jwbs['GXY_HBNS'] = $GXY_HBNS;
					$jwbs['GXY_ZL_OPTION'] = $GXY_ZL_OPTION;
					$jwbs['GXY_ZLYW'] = $GXY_ZLYW;
					$jwbs['TLB_OPTION'] = $TLB_OPTION;
					$jwbs['TLB_HBNS'] = $TLB_HBNS;
					$jwbs['TLB_ZL_OPTION'] = $TLB_ZL_OPTION;
					$jwbs['TLB_ZLYW'] = $TLB_ZLYW;
					$jwbs['ZDXWL_OPTION'] = $ZDXWL_OPTION;
					$jwbs['ZDXWL_LX'] = $ZDXWL_LX;
					$jwbs['ZDXWL_HBN'] = $ZDXWL_HBN;
					$jwbs['ZDXWL_ZL_OPTION'] = $ZDXWL_ZL_OPTION;
					$jwbs['ZDXWL_YW'] = $ZDXWL_YW;
					$jwbs['FC_OPTION'] = $FC_OPTION;
					$jwbs['FC_HBN'] = $FC_HBN;
					$jwbs['FC_ZL_OPTION'] = $FC_ZL_OPTION;
					$jwbs['FC_YW'] = $FC_YW;
					$jwbs['DZXNQXFZ_OPTION'] = $DZXNQXFZ_OPTION;
					$jwbs['ZZ_OPTION'] = $ZZ_OPTION;
					$jwbs['ZZ_LX'] = $ZZ_LX;
					$jwbs['WZXGB_OPTION'] = $WZXGB_OPTION;
					$jwbs['XJGS_OPTION'] = $XJGS_OPTION;
					$jwbs['MXSGNBQ_OPTION'] = $MXSGNBQ_OPTION;
					$jwbs['MXZSXFBJB_OPTION'] = $MXZSXFBJB_OPTION;
					$jwbs['XHDCX_OPTION'] = $XHDCX_OPTION;
					$jwbs['XLSJ_OPTION'] = $XLSJ_OPTION;
					$jwbs['JWGMJRZL_OPTION'] = $JWGMJRZL_OPTION;
					$jwbs['JWGMJRZL_BW'] = $JWGMJRZL_BW;
					$jwbs['JWGMDQZL_OPTION'] = $JWGMDQZL_OPTION;
					$jwbs->update();
				}else {
					$jwbsModel['CODE'] = $jcxx['CODE'];
					$jwbsModel->setIsNewRecord(1);
					$jwbsModel->save();
				}

				if ($yws = $ywsModel->getRowByCode($code))
				{
					$yws['ASPL_JWFY_OPTION'] = $ASPL_JWFY_OPTION;
					$yws['ASPL_ZYQJ_OPTION'] = $ASPL_ZYQJ_OPTION;
					$yws['ASPL_ZYQJ_WCL'] = $ASPL_ZYQJ_WCL;
					$yws['ASPL_ZYQJ_WYHTYYY'] = $ASPL_ZYQJ_WYHTYYY ? join(',',$ASPL_ZYQJ_WYHTYYY) : '';
					$yws['ASPL_ZYQJ_HYTY_FY'] = $ASPL_ZYQJ_HYTY_FY;
					$yws['ASPL_ZYQJ_HYTY_YY'] = $ASPL_ZYQJ_HYTY_YY ? join(',',$ASPL_ZYQJ_HYTY_YY) : '';
					$yws['LBGL_JWFY_OPTION'] = $LBGL_JWFY_OPTION;
					$yws['LBGL_ZYQJ_OPTION'] = $LBGL_ZYQJ_OPTION;
					$yws['LBGL_ZYQJ_WCL'] = $LBGL_ZYQJ_WCL;
					$yws['LBGL_ZYQJ_WYHTYYY'] = $LBGL_ZYQJ_WYHTYYY ? join(',',$LBGL_ZYQJ_WYHTYYY) : '';
					$yws['LBGL_ZYQJ_HYTY_FY'] = $LBGL_ZYQJ_HYTY_FY;
					$yws['LBGL_ZYQJ_HYTY_YY'] = $LBGL_ZYQJ_HYTY_YY ? join(',',$LBGL_ZYQJ_HYTY_YY) : '';
					$yws['ZSYKNYW_OPTION'] = $ZSYKNYW_OPTION;
					$yws['ZSYKNYW_YWMC'] = $ZSYKNYW_YWMC ? join(',',$ZSYKNYW_YWMC) : '';
					$yws['ZSYKNYW_JL'] = $ZSYKNYW_JL;
					$yws['ZSYKNYW_YYCXSJ'] = $ZSYKNYW_YYCXSJ;
					$yws['KFKNY_JWFY_OPTION'] = $KFKNY_JWFY_OPTION;
					$yws['KFKNY_ZYQJ_OPTION'] = $KFKNY_ZYQJ_OPTION;
					$yws['KFKNY_ZYQJ_YWZL'] = $KFKNY_ZYQJ_YWZL ? join(',',$KFKNY_ZYQJ_YWZL) : '';
					$yws['KFKNY_ZYQJ_ZZ'] = $KFKNY_ZYQJ_ZZ ? join(',',$KFKNY_ZYQJ_ZZ) : '';
					$yws['KFKNY_ZYQJ_INR'] = $KFKNY_ZYQJ_INR;
					$yws['TTLYW_OPTION'] = $TTLYW_OPTION;
					$yws['TTLYW_FHYW'] = $TTLYW_FHYW ? join(',',$TTLYW_FHYW) : '' ;
					$yws['TTLYW_WCL'] = $TTLYW_WCL;
					$yws['JYYW_OPTION'] = $JYYW_OPTION ? join(',',$JYYW_OPTION) : '';
					$yws['QT_XSZLYW_JWFY_OPTION'] = $QT_XSZLYW_JWFY_OPTION;
					$yws['QT_XSZLYW_ZYQJ_OPTION'] = $QT_XSZLYW_ZYQJ_OPTION;
					$yws['QT_XSZLYW_MC'] = $QT_XSZLYW_MC;
					$yws['QT_KXLSCYW_JWFY_OPTION'] = $QT_KXLSCYW_JWFY_OPTION;
					$yws['QT_KXLSCYW_ZYQJ_OPTION'] = $QT_KXLSCYW_ZYQJ_OPTION;
					$yws['QT_KXLSCYW_MC'] = $QT_KXLSCYW_MC;
					$yws['QT_QGTJKJ_JWFY_OPTION'] = $QT_QGTJKJ_JWFY_OPTION;
					$yws['QT_QGTJKJ_ZYQJ_OPTION'] = $QT_QGTJKJ_ZYQJ_OPTION;
					$yws['QT_QGTJKJ_MC'] = $QT_QGTJKJ_MC;
					$yws['QT_LLJ_JWFY_OPTION'] = $QT_LLJ_JWFY_OPTION;
					$yws['QT_LLJ_ZYQJ_OPTION'] = $QT_LLJ_ZYQJ_OPTION;
					$yws['QT_LLJ__MC'] = $QT_LLJ__MC;
					$yws['QT_WSYZJ_JWFY_OPTION'] = $QT_WSYZJ_JWFY_OPTION;
					$yws['QT_WSYZJ_ZYQJ_OPTION'] = $QT_WSYZJ_ZYQJ_OPTION;
					$yws['QT_WSYZJ_MC'] = $QT_WSYZJ_MC;
					$yws->update();
				}else {
					$ywsModel['CODE'] = $jcxx['CODE'];
					$ywsModel->setIsNewRecord(1);
					$ywsModel->save();
				}

				if ($sysjc = $sysjcModel->getRowByCode($code)) {
					$sysjc['XCG_XX'] = $XCG_XX;
					$sysjc['XCG_WBC'] = $XCG_WBC;
					$sysjc['XCG_NEUT'] = $XCG_NEUT;
					$sysjc['XCG_HGB'] = $XCG_HGB;
					$sysjc['XCG_LYM'] = $XCG_LYM;
					$sysjc['XCG_PLT'] = $XCG_PLT;
					$sysjc['XCG_HCT'] = $XCG_HCT;
					$sysjc['XSH_CRP'] = $XSH_CRP;
					$sysjc['XSH_AST'] = $XSH_AST;
					$sysjc['XSH_ALT'] = $XSH_ALT;
					$sysjc['XSH_TBIL'] = $XSH_TBIL;
					$sysjc['XSH_DBIL'] = $XSH_DBIL;
					$sysjc['XSH_UA'] = $XSH_UA;
					$sysjc['XSH_BUN'] = $XSH_BUN;
					$sysjc['XSH_CR'] = $XSH_CR;
					$sysjc['XSH_GYS'] = $XSH_GYS;
					$sysjc['XSH_TG'] = $XSH_TG;
					$sysjc['XSH_HDLC'] = $XSH_HDLC;
					$sysjc['XSH_LDLC'] = $XSH_LDLC;
					$sysjc['XSH_ZDGC'] = $XSH_ZDGC;
					$sysjc['QTSHZB_ALB'] = $QTSHZB_ALB;
					$sysjc['QTSHZB_THXHDB'] = $QTSHZB_THXHDB;
					$sysjc['QTSHZB_XT'] = $QTSHZB_XT;
					$sysjc['QTSHZB_DEJT'] = $QTSHZB_DEJT;
					$sysjc['QTSHZB_FDP'] = $QTSHZB_FDP;
					$sysjc['QTSHZB_XC'] = $QTSHZB_XC;
					$sysjc['DJZ_K'] = $DJZ_K;
					$sysjc['DJZ_NA'] = $DJZ_NA;
					$sysjc['JG_FT3'] = $JG_FT3;
					$sysjc['JG_TT3'] = $JG_TT3;
					$sysjc['JG_TSH'] = $JG_TSH;
					$sysjc['N_NWLBDB'] = $N_NWLBDB;
					$sysjc['N_NDB'] = $N_NDB;
					$sysjc['DBYX_DBYXSFYX'] = $DBYX_DBYXSFYX;
					$sysjc['XJSSBZW_CKMB'] = $XJSSBZW_CKMB;
					$sysjc['XJSSBZW_TNT'] = $XJSSBZW_TNT;
					$sysjc['XJSSBZW_TNI'] = $XJSSBZW_TNI;
					$sysjc['XSZB_BNP'] = $XSZB_BNP;
					$sysjc['XZCC_LVEF'] = $XZCC_LVEF;
					$sysjc['XZCC_ZSSZMNJZ'] = $XZCC_ZSSZMNJZ;
					$sysjc['XZCC_YS'] = $XZCC_YS;
					$sysjc['XZCC_ZF'] = $XZCC_ZF;
					$sysjc['XZCC_YF'] = $XZCC_YF;
					$sysjc['XZCC_FS'] = $XZCC_FS;
					$sysjc['XZCC_FDMSSY'] = $XZCC_FDMSSY;
					$sysjc->update();
				}else {
					$sysjcModel['CODE'] = $jcxx['CODE'];
					$sysjcModel->setIsNewRecord(1);
					$sysjcModel->save();
				}

				if ($zyqk = $zyqkModel->getRowByCode($code)) {
					$zyqk['RYTZ_XY_SSY'] = $RYTZ_XY_SSY;
					$zyqk['RYTZ_XY_SZY'] = $RYTZ_XY_SZY;
					$zyqk['RYTZ_XL_JXXL'] = $RYTZ_XL_JXXL;
					$zyqk['RYTZ_XL_FC_OPTION'] = $RYTZ_XL_FC_OPTION;
					$zyqk['CYZT_OPTION'] = $CYZT_OPTION;
					$zyqk['ZYTS'] = $ZYTS;
					$zyqk['CYZD_OPTION'] = $CYZD_OPTION;
					$zyqk['CYZD_QT'] = $CYZD_QT;
					$zyqk['CYDY_OPTION'] = $CYDY_OPTION ? join(',',$CYDY_OPTION) : '';
					$zyqk['CYDY_MC'] = $CYDY_MC;
					$zyqk['CYDY_YF'] = $CYDY_YF;
					$zyqk['CYDY_SFQJYWBH'] = $CYDY_SFQJYWBH;
					$zyqk->update();
				}else {
					$zyqkModel['CODE'] = $jcxx['CODE'];
					$zyqkModel->setIsNewRecord(1);
					$zyqkModel->save();
				}

				if ($dbz = $dbzModel->getRowByCode($code)) {
					$dbz['XS_BY_OPTION'] = $XS_BY_OPTION;
					$dbz['XS_BY_QT'] = $XS_BY_QT;
					$dbz['XS_LX_OPTION'] = $XS_LX_OPTION;
					$dbz['XS_OPTION'] = $XS_OPTION;
					$dbz['XS_XGN_OPTION'] = $XS_XGN_OPTION;
					$dbz['XS_YWSY_LNJ_OPTION'] = $XS_YWSY_LNJ_OPTION;
					$dbz['XS_YWSY_B_OPTION'] = $XS_YWSY_B_OPTION;
					$dbz['XS_YWSY_ACEI_OPTION'] = $XS_YWSY_ACEI_OPTION;
					$dbz['XS_YWSY_LNZ_OPTION'] = $XS_YWSY_LNZ_OPTION;
					$dbz['XS_YWSY_DGX_OPTION'] = $XS_YWSY_DGX_OPTION;
					$dbz['XS_YWSY_GLZJKJ_OPTION'] = $XS_YWSY_GLZJKJ_OPTION;
					$dbz['XG_KILLIP_OPTION'] = $XG_KILLIP_OPTION;
					$dbz['XG_BW'] = $XG_BW ? join(',',$XG_BW) : '';
					$dbz['XG_LX'] = $XG_LX;
					$dbz['XG_SFJZJRZL_OPTION'] = $XG_SFJZJRZL_OPTION;
					$dbz['XG_MZSJ'] = $XG_MZSJ;
					$dbz['XG_FMC'] = $XG_FMC;
					$dbz['XG_SS_LM_CD'] = $XG_SS_LM_CD;
					$dbz['XG_SS_LM_ZJLX'] = $XG_SS_LM_ZJLX;
					$dbz['XG_SS_LM_DX'] = $XG_SS_LM_DX;
					$dbz['XG_SS_LAD_CD'] = $XG_SS_LAD_CD;
					$dbz['XG_SS_LAD_ZJLX'] = $XG_SS_LAD_ZJLX;
					$dbz['XG_SS_LAD_DX'] = $XG_SS_LAD_DX;
					$dbz['XG_SS_RCA_CD'] = $XG_SS_RCA_CD;
					$dbz['XG_SS_RCA_ZJLX'] = $XG_SS_RCA_ZJLX;
					$dbz['XG_SS_RCA_DX'] = $XG_SS_RCA_DX;
					$dbz['XG_SS_LCX_CD'] = $XG_SS_LCX_CD;
					$dbz['XG_SS_LCX_ZJLX'] = $XG_SS_LCX_ZJLX;
					$dbz['XG_SS_LCX_DX'] = $XG_SS_LCX_DX;
					$dbz['XG_SS_DIA_CD'] = $XG_SS_DIA_CD;
					$dbz['XG_SS_DIA_ZJLX'] = $XG_SS_DIA_ZJLX;
					$dbz['XG_SS_DIA_DX'] = $XG_SS_DIA_DX;
					$dbz['XG_SS_OM_CD'] = $XG_SS_OM_CD;
					$dbz['XG_SS_OM_ZJLX'] = $XG_SS_OM_ZJLX;
					$dbz['XG_SS_OM_DX'] = $XG_SS_OM_DX;
					$dbz['XG_SS_PDA_CD'] = $XG_SS_PDA_CD;
					$dbz['XG_SS_PDA_ZJLX'] = $XG_SS_PDA_ZJLX;
					$dbz['XG_SS_PDA_DX'] = $XG_SS_PDA_DX;
					$dbz['XG_SS_PLA_CD'] = $XG_SS_PLA_CD;
					$dbz['XG_SS_PLA_ZJLX'] = $XG_SS_PLA_ZJLX;
					$dbz['XG_SS_PLA_DX'] = $XG_SS_PLA_DX;
					$dbz['XG_SS_QT_TEXT'] = $XG_SS_QT_TEXT;
					$dbz['XG_SS_QT_CD'] = $XG_SS_QT_CD;
					$dbz['XG_SS_QT_ZJLX'] = $XG_SS_QT_ZJLX;
					$dbz['XG_SS_QT_DX'] = $XG_SS_QT_DX;
					$dbz['SP_LX_OPTION'] = $SP_LX_OPTION;
					$dbz['SP_SSSJ'] = $SP_SSSJ;
					$dbz['SP_SSFF_OPTION'] = $SP_SSFF_OPTION;
					$dbz['SP_YYWC_OPTION'] = $SP_YYWC_OPTION;
					$dbz['SP_YYWC_YW'] = $SP_YYWC_YW;
					$dbz['QBQ_ZRYY_OPTION'] = $QBQ_ZRYY_OPTION;
					$dbz['QBQ_LX_OPTION'] = $QBQ_LX_OPTION;
					$dbz['QBQ_SSSJ'] = $QBQ_SSSJ;
					$dbz['QBQ_CQSFYY'] = $QBQ_CQSFYY;
					$dbz['QBQ_XLSCYY'] = $QBQ_XLSCYY;
					$dbz['QBQ_SFQJ_YJFZ_OPTION'] = $QBQ_SFQJ_YJFZ_OPTION;
					$dbz['QBQ_SFQJ_ICD_OPTION'] = $QBQ_SFQJ_ICD_OPTION;
					$dbz['QBQ_SFQJ_GNYC_OPTION'] = $QBQ_SFQJ_GNYC_OPTION;
					$dbz['QBQ_SFQJ_SFGZ_OPTION'] = $QBQ_SFQJ_SFGZ_OPTION;
					$dbz->update();
				}else {
					$dbzModel['CODE'] = $jcxx['CODE'];
					$dbzModel->setIsNewRecord(1);
					$dbzModel->save();
				}

				if ($sfzdsj = $sfzdsjModel->getRowByCode($code)) {
					$sfzdsj['SW_OPTION'] = $SW_OPTION;
					$sfzdsj['SW_YY_OPTION'] = $SW_YY_OPTION;
					$sfzdsj['ZZ_OPTION'] = $ZZ_OPTION;
					$sfzdsj['ZZ_YY_OPTION'] = $ZZ_YY_OPTION;
					$sfzdsj['XS_OPTION'] = $XS_OPTION;
					$sfzdsj['CX_OPTION'] = $CX_OPTION;
					$sfzdsj['CX_LX_OPTION'] = $CX_LX_OPTION;
					$sfzdsj['CX_BW'] = $CX_BW;
					$sfzdsj['CX_SFSX_OPTION'] = $CX_SFSX_OPTION;
					$sfzdsj['XJGS_OPTION'] = $XJGS_OPTION;
					$sfzdsj['ZZY_OPTION'] = $ZZY_OPTION;
					$sfzdsj['ZZY_ZYCS'] = $ZZY_ZYCS;
					$sfzdsj['XLSC_OPTION'] = $XLSC_OPTION;
					$sfzdsj->update();
				}else {
					$sfzdsjModel['CODE'] = $jcxx['CODE'];
					$sfzdsjModel->setIsNewRecord(1);
					$sfzdsjModel->save();
				}
				$transaction->commit();
			} catch (Exception $e) {
				$this->log_info($e);
				$transaction->rollback();
				$this->_output(-1, '保存数据失败，请稍后重试');
			}

		}
		// 新增
		if($op == 'add')
		{
			$transaction = Yii::app()->db->beginTransaction();
			try {
				$jcxxModel['CODE'] = $this->getPatientCode();
				$jcxxModel->setIsNewRecord(1);

				$flag = $jcxxModel->save();
				$jwbsModel['CODE'] = $jcxxModel['CODE'];
				$jwbsModel->setIsNewRecord(1);
				$jwbsModel->save();

				$ywsModel['CODE'] = $jcxxModel['CODE'];
				$ywsModel->setIsNewRecord(1);
				$ywsModel->save();

				$sysjcModel['CODE'] = $jcxxModel['CODE'];
				$sysjcModel->setIsNewRecord(1);
				$sysjcModel->save();

				$zyqkModel['CODE'] = $jcxxModel['CODE'];
				$zyqkModel->setIsNewRecord(1);
				$zyqkModel->save();

				$dbzModel['CODE'] = $jcxxModel['CODE'];
				$dbzModel->setIsNewRecord(1);
				$dbzModel->save();

				$sfzdsjModel['CODE'] = $jcxxModel['CODE'];
				$sfzdsjModel->setIsNewRecord(1);
				$sfzdsjModel->save();

				$transaction->commit();
			} catch (Exception $e) {
				$this->log_info($e);
				$transaction->rollback();
				$this->_output(-1, '保存数据失败，请稍后重试');
			}
		}
		$this->_output(0, '保存数据成功');
		// $this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");
	}

	//上传图片
	public function actionUpload()
	{
		$uploadHandler = CUploadedFile::getInstanceByName('image');
		$path = Yii::app()->BasePath."/../assets/filestore/image/";
		$realname = Yii::app()->filestore->createRealName($path, $uploadHandler->name);
		if (!$uploadHandler->saveAs($realname))
		{
			$errmsg = $uploadHandler->getErrorMessage();
			echo json_encode(array('code' => -1,'error' => $errmsg));exit;
		}
		//图片保存访问地址
		$url = Yii::app()->filestore->getUrl($realname);

		echo json_encode(array('code' => 0,'url' => $url));
		Yii::app()->end();
	}

	/**
	 * 删除病历
	 */
	public function actionDel()
	{
		$code = Yii::app()->request->getParam('code', '');
		if (!isset($code)) {

			exit;
		}
		$jcxxModel = new JcxxModel();
		$jwbsModel = new JwbsModel();
		$ywsModel = new YwsModel();
		$sysjcModel = new SysjcModel();
		$zyqkModel = new ZyqkModel();
		$dbzModel = new DbzModel();
		$sfzdsjModel = new SfzdsjModel();

		$transaction = Yii::app()->db->beginTransaction();
		try {
			$jcxxModel->deleteByCode($code);
			$jwbsModel->deleteByCode($code);
			$ywsModel->deleteByCode($code);
			$sysjcModel->deleteByCode($code);
			$zyqkModel->deleteByCode($code);
			$dbzModel->deleteByCode($code);
			$sfzdsjModel->deleteByCode($code);
			$transaction->commit();
		} catch (Exception $e) {
			$this->log_info($e);
			$transaction->rollback();
			$this->_output(-1, '删除数据失败，请稍后重试');
		}
		$this->_output(0, '成功');
		// $this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");
	}

	// 删除图片
	public function actionUploadDel()
	{

	}

	// 生成病人编号
	private function getPatientCode()
	{
		$code = $_SESSION['pid'];
		if (!isset($code)) {
			// 获取数据库中最大的patientid
			$patientModel = new JcxxModel();
			$patient = $patientModel->getMaxPatientCode();
			if($patient){
				$code = $patient['CODE'];
			}
		}
		if (!isset($code)) {
			$code = date('Ymd',time()).'0001';
		} else {
			// echo $code;
			// exit;
			$date = substr($code,0,8);
			if ($date == date('Ymd',time())) {
				$sequence = intval(substr($code,9));
				$sequence += 10001;
				$code = $date.substr(strval($sequence),1);
			} else {
				$code = date('Ymd',time()).'0001';
			}
		}
		$_SESSION['pid'] = $code;
		return $code;
	}

}
