<?php
class Controller extends CController
{
	public $layout='';
	public $version = '1.0';


	protected $_timestamp = null;
	protected $_pagesize = 0;
	protected $_result = array();

	public function init()
	{
      parent::init();
  		date_default_timezone_set('PRC');
			$this->_timestamp = time();
			$this->_pagesize = Yii::app()->params['pagination']['pagesize'];
    	// $this->pageTitle = Yii::app()->name;
			$this->setPageTitle(Yii::app()->name);
			Yii::app()->params['front'] = Yii::app()->request->hostInfo . Yii::app()->baseUrl; //形如、http://http://202.98.63.163/cqpay

			//log input
			Yii::log("\n\n\n############Req url from Controller############:\n {$_SERVER['REQUEST_URI']}", CLogger::LEVEL_INFO, "application.controller.*");
	}

	/**
	 * view 层输出变量
	 *
	 * @param unknown_type $value
	 * @param unknown_type $default
	 * @param unknown_type $print 是否打印
	 */
	public function launch($value, $default = '', $print = true)
	{
		$value = (isset($value) && $value) ? $value : $default;

		if ($print)
		{
			echo $value;
		}
		else
		{
			return $value;
		}
	}

	/**
	 * 输出结果(json)
	 *
	 * @param unknown_type $code
	 * @param unknown_type $message
	 */
	public function _output($code = 0, $message = '', $format = 'json', $func = '')
	{
		$this->_result['errcode'] = $code;
		$this->_result['errmsg'] = $message;

		if ($format == 'json')
		{
			header("Content-type:application/json");
			echo json_encode($this->_result);
		}
		else if($format === 'script')
		{
			echo "<script type='text/javascript' charset='utf-8'>{$func}('{$code}', '{$message}', '".json_encode($this->_result)."')</script>";
		}
		else if($format === 'text')
		{
			header("Content-type:text/html;charset=utf-8;");
			echo $message;
		}
		else if($format === 'raw')
		{
			return $this->_result;
		}

		Yii::log("\nReq url:\n {$_SERVER['REQUEST_URI']}：\nReq output:\n ".print_r($this->_result, true), CLogger::LEVEL_INFO, "application.controller.*");
		Yii::app()->end();
	}

	public function __destruct()
	{

	}

	protected function log_info($e)
	{
		Yii::log(print_r($e, true), CLogger::LEVEL_INFO, "application.controller.*");
	}

	protected function log_debug($e)
	{
		Yii::log(print_r($this->_result, true), CLogger::LEVEL_DEBUG, "application.controller.*");
	}


}
