<?php
/**
 * 日志路由配置
 * info作为日常调试用，写文件，线上则关闭
 * error作为运营观察用，写鹰眼，线上开启
 */

return array(
	'class'=>'CLogRouter',
	'routes'=>array(
		///////////////////////////////////////////////////////////////////////////////////////////
		//使用CFileLogRoute记录文件日志
		///////////////////////////////////////////////////////////////////////////////////////////
		//记录错误日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'error',		//日志级别
			'categories'=>'',				//日志分类，不填写，表示全部类别
			'logFile'=>'error.log',
            'enabled'=>YII_DEBUG?true:false,
		),
		
		//记录info日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'info',				//日志级别
			'categories'=>'application.controller.*',	//日志分类
			//'LogDir'=>LOG_DIR,
			'logFile'=>'info.log',
			'enabled'=>YII_DEBUG?true:false	//只有调试模式记录，即在开发环境或测试记录
		),
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'info',				//日志级别
			'categories'=>'application.command.*',	//日志分类
			'logFile'=>'infoCMD.log',
			'enabled'=>YII_DEBUG?true:false	//只有调试模式记录，即在开发环境或测试记录
		),		
		
		//记录调试日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'trace',				//日志级别
			'categories'=>'',				//日志分类，不填写，表示全部类别
			'logFile'=>'trace.log',
			'enabled'=>YII_DEBUG?true:false	//只有调试模式记录，即在开发环境或测试记录
		),
		
		//记录所有日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'',					//日志级别，不填写，表示全部类别
			'categories'=>'',				//日志分类，不填写，表示全部类别
			'logFile'=>'all.log',
			'enabled'=>YII_DEBUG?true:false	//只有调试模式记录，即在开发环境或测试记录
		),
		//微信接口日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'',					//日志级别，不填写，表示全部类别
			'categories'=>'wx.*',				//日志分类，不填写，表示全部类别
			'logFile'=>'wx.log',
			'enabled'=>YII_DEBUG?true:true,	//只有调试模式记录，即在开发环境或测试记录
		),

		//远程接口日志
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'',					//日志级别，不填写，表示全部类别
			'categories'=>'remote.*',				//日志分类，不填写，表示全部类别
			'logFile'=>'remote.log',
			'enabled'=>YII_DEBUG?true:false	//只有调试模式记录，即在开发环境或测试记录
		),		
		
		//记录性能日志
		array(
			'class'=>'CProfileLogRoute',
			'levels'=>'',					//日志级别，不填写，表示全部类别
			'categories'=>'',				//日志分类，不填写，表示全部类别
			'enabled'=>YII_DEBUG?true:false,//开发环境，启用web日志
		),
		
		///////////////////////////////////////////////////////////////////////////////////////////
		//使用CWebLogRoute记录web日志
		///////////////////////////////////////////////////////////////////////////////////////////
		//记录Web日志
		/**/
		array(
			'class'=>'CWebLogRoute',
			'levels'=>'',				//日志级别
			'categories'=>'',				//日志分类，不填写，表示全部类别
			'enabled'=>YII_DEBUG?false:false,//开发环境，启用web日志
		),/**/
	)
);