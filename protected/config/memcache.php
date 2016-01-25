<?php
/**
 * 配置文件memcache
 */

return array(
    'class'=>'CMemCache',
	'keyPrefix'=>'cqjinke_jole',
    'servers'=>array(
        array(
            'host'=>'121.40.68.189',
            'port'=>11211,
            'weight'=>100,
        ),
    ),
);
