<?php
/**
 * 配置文件redis
 */

return array(
    'class'=>'ext.redis.CRedisCache',
    'servers'=>array(
        array(
            'host'=>'127.0.0.1',
            'port'=>6379,
        ),
    ),
);
