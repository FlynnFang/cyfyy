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
		$inArray = array_keys($shareSet);

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

		if ($name) {
			$c->addSearchCondition('name',$name);
		}
		if ($hospital) {
			$c->addCondition('hospital='.$hospital);
		}

		//分页
		$start = ($page - 1) * $this->_pagesize;

		$patientModel = new PatientModel();
		//总数
		$total = $patientModel->count($c);

		//分页
		$pages = new CPagination($total);
		$pages->pageSize = Yii::app()->params['paginavtion']['pagesize'];
		$pages->route = '/admin/patient/list';
		$pages->applyLimit($c);

		$c->order = "create_time desc";


		$list = $patientModel->getRows($c);
		// var_dump($list);
		// exit;

		// var_dump($list, $total);exit;
		$this->setPageTitle('大儿童病例列表');
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

		$patientModel = new PatientModel();
		$patient = $patientModel->getRowByCode($patient_code);

		$diagModel = new DiagnosticModel();
		$diagnostic = $diagModel->getRowByCode($patient_code);
		if ($diagnostic) {
			$diagnostic['xztz_bw'] = explode(',',$diagnostic['xztz_bw']);
			$diagnostic['xztz_sq'] = explode(',',$diagnostic['xztz_sq']);
			$diagnostic['qtjx_ext'] = explode(',',$diagnostic['qtjx_ext']);

		}
		$operationModel = new OperationModel();
		$operation = $operationModel->getRowByCode($patient_code);


		$configModel = new ConfigModel();
		$bw = $configModel->getSetByType(Yii::app()->params['configType']['xztz_bw']);
		$sq = $configModel->getSetByType(Yii::app()->params['configType']['xztz_sq']);
		$qtjx = $configModel->getSetByType(Yii::app()->params['configType']['qtjx']);
		$xlsc = $configModel->getSetByType(Yii::app()->params['configType']['xlsc']);
		$hospitals = $configModel->getSetByType(Yii::app()->params['configType']['hospital']);


		$this->setPageTitle($op=='view'? '查看病历':'编辑病历');
		$this->render('edit',array(
			'patient' => $patient,
			'diagnostic' => $diagnostic,
			'operation' => $operation,
			'nationality' => Yii::app()->params['nationality'],
			'have' => Yii::app()->params['have'],
			'boolean' => Yii::app()->params['boolean'],
			'notquite' => Yii::app()->params['notquite'],
			'bw' => $bw,
			'sq'=> $sq,
			'qtjx'=> $qtjx,
			'xlsc'=> $xlsc,
			'hospitals' => $hospitals,
			'op' => $op,
			));
	}

	/**
	 * 更新病历
	 */
	public function actionUpdate()
	{
		$op = Yii::app()->request->getParam('op', '');
		$code = Yii::app()->request->getPost('code', '');

		$name= Yii::app()->request->getPost("name", '');
		$sex = Yii::app()->request->getPost("sex", 2);
		$born = Yii::app()->request->getPost("born",'');
		$nationality = Yii::app()->request->getPost("nationality", '');
		$place = Yii::app()->request->getPost("place", '');
		$phone = Yii::app()->request->getPost("phone", '');
		$address = Yii::app()->request->getPost("address", '');
		$has_history = Yii::app()->request->getPost('$has_history',0);
		$height = Yii::app()->request->getPost('height', '');
		$weight = Yii::app()->request->getPost('weight', '');
		$BMI = Yii::app()->request->getPost('BMI', 0.0);
		$xxbjrss = Yii::app()->request->getPost('xxbjrss', 0);
		$follow_hospital = Yii::app()->request->getPost('follow_hospital', '');



		$xztz_zy = Yii::app()->request->getPost('xztz_zy', 0);
		$xztz_bw = Yii::app()->request->getPost('xztz_bw', ''); //数组
		$xztz_sq = Yii::app()->request->getPost('xztz_sq'); //数组
		$kyzx_wykn = Yii::app()->request->getPost('kyzx_wykn', 0);
		$kyzx_ffgm = Yii::app()->request->getPost('kyzx_ffgm', 0);
		$kyzx_tsmr = Yii::app()->request->getPost('kyzx_tsmr', 0);
		$kyzx_hdnlc = Yii::app()->request->getPost('kyzx_hdnlc', 0);
		$kyzx_xxqlq = Yii::app()->request->getPost('kyzx_xxqlq', 0);
		$kyzx_fg = Yii::app()->request->getPost('kyzx_fg', 0);
		$kyzx_szfych = Yii::app()->request->getPost('kyzx_szfych', 0);
		$kyzx_hxjc = Yii::app()->request->getPost('kyzx_hxjc', 0);
		$kyzx_hxjc_ext = Yii::app()->request->getPost('kyzx_hxjc_ext', 0);
		$kyzx_xdj = Yii::app()->request->getPost('kyzx_xdj', 0);
		$jpcysz_shou_1 = Yii::app()->request->getPost('jpcysz_shou_1', 0.0);
		$jpcysz_yz_1 = Yii::app()->request->getPost('jpcysz_yz_1', 0.0);
		$jpcysz_shou_2 = Yii::app()->request->getPost('jpcysz_shou_2', 0.0);
		$jpcysz_yz_2 = Yii::app()->request->getPost('jpcysz_yz_2', 0.0);
		$jpcysz_shou_3 = Yii::app()->request->getPost('jpcysz_shou_3', 0.0);
		$jpcysz_yz_3 = Yii::app()->request->getPost('jpcysz_yz_3', 0.0);
		$fmwycqblsj_yzqgr = Yii::app()->request->getPost('fmwycqblsj_yzqgr', 0);
		$fmwycqblsj_xy = Yii::app()->request->getPost('fmwycqblsj_xy', 0);
		$fmwycqblsj_dwjc = Yii::app()->request->getPost('fmwycqblsj_dwjc', 0);
		$fmwycqblsj_xj = Yii::app()->request->getPost('fmwycqblsj_xj', 0);
		$fmwycqblsj_sxjc = Yii::app()->request->getPost('fmwycqblsj_sxjc', 0);
		$xzcc_PDA = Yii::app()->request->getPost('xzcc_PDA', 0);
		$xzcc_VSD = Yii::app()->request->getPost('xzcc_VSD', 0);
		$xzcc_ASD = Yii::app()->request->getPost('xzcc_ASD', 0);
		$xzcc_TFO = Yii::app()->request->getPost('xzcc_TFO', 0);
		$xzcc_PS = Yii::app()->request->getPost('xzcc_PS', 0);
		$xzcc_Ebstein = Yii::app()->request->getPost('xzcc_Ebstein', 0);
		$xzcc_qt = Yii::app()->request->getPost('xzcc_qt', 0);
		$xzcc_qt_ext = Yii::app()->request->getPost('xzcc_qt_ext', '');
		$qtjx = Yii::app()->request->getPost('qtjx', 0);
		$qtjx_ext = Yii::app()->request->getPost('qtjx_ext', '');


		$ssbh = Yii::app()->request->getPost('ssbh', '');
		$sssj = Yii::app()->request->getPost('sssj', 0);
		$ssfs_jrfd = Yii::app()->request->getPost('ssfs_jrfd', 0);
		$ssfs_jrfd_qxmc = Yii::app()->request->getPost('ssfs_jrfd_qxmc', '');
		$ssfs_jrfd_size = Yii::app()->request->getPost('ssfs_jrfd_size', '');
		$ssfs_wkkx = Yii::app()->request->getPost('ssfs_wkkx', 0);
		$ssfs_wxqkfd = Yii::app()->request->getPost('ssfs_wxqkfd', 0);
		$ssbfz_rx = Yii::app()->request->getPost('ssbfz_rx', 0);
		$ssbfz_cyl = Yii::app()->request->getPost('ssbfz_cyl', 0);
		$ssbfz_xlsc = Yii::app()->request->getPost('ssbfz_xlsc', 0);
		$ssbfz_xlsc_sxzb = Yii::app()->request->getPost('ssbfz_xlsc_sxzb', '');
		$ssbfz_xlsc_fscdzz = Yii::app()->request->getPost('ssbfz_xlsc_fscdzz', '');
		$ssbfz_szcdzz = Yii::app()->request->getPost('ssbfz_szcdzz', 0);
		$ssbfz_fc = Yii::app()->request->getPost('ssbfz_fc', 0);
		$ssbfz_Erosion = Yii::app()->request->getPost('ssbfz_Erosion', 0);
		$ssbfz_fdqtl = Yii::app()->request->getPost('ssbfz_fdqtl', 0);
		$ssbfz_qt = Yii::app()->request->getPost('ssbfz_qt', '');
		$shcs_image = Yii::app()->request->getPost('shcs_image', '');
		$shcs_text = Yii::app()->request->getPost('shcs_text', '');
		$shsf_date = Yii::app()->request->getPost('shsf_date', 0);
		$shsf_rx = Yii::app()->request->getPost('shsf_rx', 0);
		$shsf_cyl = Yii::app()->request->getPost('shsf_cyl', 0);
		$shsf_xlsc = Yii::app()->request->getPost('shsf_xlsc', 0);
		$shsf_xlsc_sxzb = Yii::app()->request->getPost('shsf_xlsc_sxzb', '');
		$shsf_xlsc_fscdzz = Yii::app()->request->getPost('shsf_xlsc_fscdzz', '');
		$shsf_szcdzz = Yii::app()->request->getPost('shsf_szcdzz', 0);
		$shsf_fc = Yii::app()->request->getPost('shsf_fc', 0);
		$shsf_Erosion = Yii::app()->request->getPost('shsf_Erosion', 0);
		$shsf_fdqtl = Yii::app()->request->getPost('shsf_fdqtl', 0);
		$shsf_qt = Yii::app()->request->getPost('shsf_qt', '');
		$shsf_cs_image = Yii::app()->request->getPost('shsf_cs_image', '');
		$shsf_cs_text = Yii::app()->request->getPost('shsf_cs_text', '');


		// echo '$name'.!$name;
		// echo '$sex'.!$sex;
		// echo '$born'.!$born;
		// echo '$nationality'.!$nationality;
		// echo '$place'.!$place;
		// echo '$phone'.!$phone;
		// echo '$address'.!$address;
		// echo '$has_history'.!$has_history;
		// exit;
		if (!$name || !$born || !$nationality || !$place || !$phone || !$address  ) {
			$this->_output(-1, '参数错误');
		}



		$patientModel = new PatientModel();
		$patientModel['name'] = $name;
		$patientModel['sex'] = $sex;
		$patientModel['born'] = strtotime($born);
		$patientModel['nationality'] = $nationality;
		$patientModel['place'] = $place;
		$patientModel['phone'] = $phone;
		$patientModel['address'] = $address;
		$patientModel['has_history'] = $has_history;
		$patientModel['height'] = $height;
		$patientModel['weight'] = $weight;
		$patientModel['BMI'] = $height > 0 ? $weight/pow($height/100,2) : 0;//体重(公斤) / 身高2(米2)
		$patientModel['hospital'] = $this->_userInfo['hospital'];
		$patientModel['follow_hospital'] = $follow_hospital;
		$patientModel['xxbjrss'] = $xxbjrss;
		$patientModel['create_time'] = time();

		$diagnosticModel = new DiagnosticModel();
		$diagnosticModel['xztz_zy'] = $xztz_zy;
		$diagnosticModel['xztz_bw'] = $xztz_bw ? join(',',$xztz_bw) : '';
		$diagnosticModel['xztz_sq'] = $xztz_sq ? join(',',$xztz_sq) : '';
		$diagnosticModel['kyzx_wykn'] = $kyzx_wykn;
		$diagnosticModel['kyzx_ffgm'] = $kyzx_ffgm;
		$diagnosticModel['kyzx_tsmr'] = $kyzx_tsmr;
		$diagnosticModel['kyzx_hdnlc'] = $kyzx_hdnlc;
		$diagnosticModel['kyzx_xxqlq'] = $kyzx_xxqlq;
		$diagnosticModel['kyzx_fg'] = $kyzx_fg;
		$diagnosticModel['kyzx_szfych'] = $kyzx_szfych;
		$diagnosticModel['kyzx_hxjc'] = $kyzx_hxjc;
		$diagnosticModel['kyzx_hxjc_ext'] = $kyzx_hxjc_ext;
		$diagnosticModel['kyzx_xdj'] = $kyzx_xdj;
		$diagnosticModel['jpcysz_shou_1'] = $jpcysz_shou_1;
		$diagnosticModel['jpcysz_yz_1'] = $jpcysz_yz_1;
		$diagnosticModel['jpcysz_shou_2'] = $jpcysz_shou_2;
		$diagnosticModel['jpcysz_yz_2'] = $jpcysz_yz_2;
		$diagnosticModel['jpcysz_shou_3'] = $jpcysz_shou_3;
		$diagnosticModel['jpcysz_yz_3'] = $jpcysz_yz_3;
		$diagnosticModel['fmwycqblsj_yzqgr'] = $fmwycqblsj_yzqgr;
		$diagnosticModel['fmwycqblsj_xy'] = $fmwycqblsj_xy;
		$diagnosticModel['fmwycqblsj_dwjc'] = $fmwycqblsj_dwjc;
		$diagnosticModel['fmwycqblsj_xj'] = $fmwycqblsj_xj;
		$diagnosticModel['fmwycqblsj_sxjc'] = $fmwycqblsj_sxjc;
		$diagnosticModel['xzcc_PDA'] = $xzcc_PDA;
		$diagnosticModel['xzcc_VSD'] = $xzcc_VSD;
		$diagnosticModel['xzcc_ASD'] = $xzcc_ASD;
		$diagnosticModel['xzcc_TFO'] = $xzcc_TFO;
		$diagnosticModel['xzcc_PS'] = $xzcc_PS;
		$diagnosticModel['xzcc_Ebstein'] = $xzcc_Ebstein;
		$diagnosticModel['xzcc_qt'] = $xzcc_qt;
		$diagnosticModel['xzcc_qt_ext'] = $xzcc_qt_ext;
		$diagnosticModel['qtjx'] = $qtjx;
		$diagnosticModel['qtjx_ext'] = $qtjx_ext ? join(',',$qtjx_ext) : '';


		$operationModel = new OperationModel();

		$operationModel['ssbh'] = $ssbh;
		$operationModel['sssj'] = strtotime($sssj);
		$operationModel['ssfs_jrfd'] = $ssfs_jrfd;
		$operationModel['ssfs_jrfd_qxmc'] = $ssfs_jrfd_qxmc;
		$operationModel['ssfs_jrfd_size'] = $ssfs_jrfd_size;
		$operationModel['ssfs_wkkx'] = $ssfs_wkkx;
		$operationModel['ssfs_wxqkfd'] = $ssfs_wxqkfd;
		$operationModel['ssbfz_rx'] = $ssbfz_rx;
		$operationModel['ssbfz_cyl'] = $ssbfz_cyl;
		$operationModel['ssbfz_xlsc'] = $ssbfz_xlsc;
		$operationModel['ssbfz_xlsc_sxzb'] = $ssbfz_xlsc_sxzb;
		$operationModel['ssbfz_xlsc_fscdzz'] = $ssbfz_xlsc_fscdzz;
		$operationModel['ssbfz_szcdzz'] = $ssbfz_szcdzz;
		$operationModel['ssbfz_fc'] = $ssbfz_fc;
		$operationModel['ssbfz_Erosion'] = $ssbfz_Erosion;
		$operationModel['ssbfz_fdqtl'] = $ssbfz_fdqtl;
		$operationModel['ssbfz_qt'] = $ssbfz_qt;
		$operationModel['shcs_image'] = $shcs_image;
		$operationModel['shcs_text'] = $shcs_text;
		$operationModel['shsf_date'] = strtotime($shsf_date);
		$operationModel['shsf_rx'] = $shsf_rx;
		$operationModel['shsf_cyl'] = $shsf_cyl;
		$operationModel['shsf_xlsc'] = $shsf_xlsc;
		$operationModel['shsf_xlsc_sxzb'] = $shsf_xlsc_sxzb;
		$operationModel['shsf_xlsc_fscdzz'] = $shsf_xlsc_fscdzz;
		$operationModel['shsf_szcdzz'] = $shsf_szcdzz;
		$operationModel['shsf_fc'] = $shsf_fc;
		$operationModel['shsf_Erosion'] = $shsf_Erosion;
		$operationModel['shsf_fdqtl'] = $shsf_fdqtl;
		$operationModel['shsf_qt'] = $shsf_qt;
		$operationModel['shsf_cs_image'] = $shsf_cs_image;
		$operationModel['shsf_cs_text'] = $shsf_cs_text;



		//更新
		if ($op == 'edit' && $code && $patient = $patientModel->getRowByCode($code)) {

			$patientModel['id'] = $patient['id'];
			$patientModel['patient_code'] = $patient['patient_code'];
			$patientModel['hospital'] = $patient['hospital'];
			$patientModel->update();

			if ($diagnostic = $diagnosticModel->getRowByCode($code))
			{
				$diagnosticModel['id'] = $diagnostic['id'];
				$diagnosticModel['patient_code'] = $patient['patient_code'];
				$diagnosticModel->update();
			}else {
				$diagnosticModel['patient_code'] = $patient['patient_code'];
				$diagnosticModel->setIsNewRecord(1);
				$diagnosticModel->save();
			}
			if ($operation = $operationModel->getRowByCode($code)) {
				$operationModel['id'] = $operation['id'];
				$operationModel['patient_code'] = $patient['patient_code'];
				$operationModel->update();
			}else {
				$operationModel['patient_code'] = $patient['patient_code'];
				$operationModel->setIsNewRecord(1);
				$operationModel->save();
			}

		}
		// 新增
		if($op == 'add')
		{

			$patientModel['patient_code'] = $this->getPatientCode();
			$patientModel->setIsNewRecord(1);

			$flag = $patientModel->save();

			$diagnosticModel['patient_code'] = $patientModel['patient_code'];
			$diagnosticModel->setIsNewRecord(1);
			$diagnosticModel->save();
			$operationModel['patient_code'] = $patientModel['patient_code'];
			$operationModel->setIsNewRecord(1);
			$operationModel->save();

		}

		$this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");

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
		$operationModel = new OperationModel();
		$diagnosticModel = new DiagnosticModel();
		$patientModel = new PatientModel();

		$operationModel->deleteByCode($code);
		$diagnosticModel->deleteByCode($code);
		$patientModel->deleteByCode($code);

		$this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");
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
			$patientModel = new PatientModel();
			$patient = $patientModel->getMaxPatientCode();
			if($patient){
				$code = $patient['patient_code'];
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
