<?php
return array(
	'urlFormat'=>'path',
	'rules'=>array(
		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		'<controller:\w+>/<id:\d+>'=>'<controller>/view',
		'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',		
	),		
);
