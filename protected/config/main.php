<?php
define('CONFIG_PATH', dirname(__FILE__));

return array(
	'basePath'=>CONFIG_PATH.DIRECTORY_SEPARATOR.'..',
	'name'=>'心血管疾病患者数据采集系统',

	//preloading 'log' component
	'preload'=>array('log'),

	//default controller
	'defaultController'=>"admin/login",

	//autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.remote.*',
		'application.components.*',
        'application.library.*',
	),

	//modules
	'modules'=>array(),

	//各个组件的配置信息
	'components'=>array(
		//路由组件
		'urlManager'=>require(CONFIG_PATH.'/url.php'),
		//日志组件
		'log'=>require(CONFIG_PATH.'/log.php'),
		//memcache
		// "cache"=>require(CONFIG_PATH.'/memcache.php'),
		//redis
		//'redis'=>require(CONFIG_PATH.'/redis.php'),
    //数据库组件
    'db'=>require(CONFIG_PATH.'/db.php'),
	  //微信组件
    // 'wxapi'=>require(CONFIG_PATH.'/wxapi.php'),
		//curl
		'curl'=>require(CONFIG_PATH.'/curl.php'),
		//filestore
		'filestore'=>require(CONFIG_PATH.'/filestore.php'),
	),

	//params
	'params'=>require(CONFIG_PATH.'/params.php'),
);
