<?php
class BaseModel extends CActiveRecord
{
    public static $tableName;
    public static $className;

    public function __construct($tableName = '', $className = __CLASS__) {
        if ($tableName === null) {
            parent::__construct(null);
        } else {
            self::$tableName = $tableName;
        }
    }

    public static function model($tableName = '', $className = __CLASS__) {
        self::$tableName = $tableName;
        return parent::model($className);
    }

    public function tableName() {
        return self::$tableName;
    }

    //根据id查询记录
    public function getById($id) {
        $obj = $this->findByPk($id);
        return $obj->attributes;
    }

    //查询单条记录
    public function getRow($criteria=null) {
        $obj = $this->find($criteria);
        if($criteria->select == '*') {
            return $obj->attributes;
        } else {
            return array_filter($obj->attributes,'strlen');
        }
    }

    //查询多条记录
    public function getRows($criteria=null) {
        $ret = array();
        $obj = $this->findAll($criteria);
        if($criteria->select == '*') {
            foreach($obj as $k=>$v) {
                $ret[$k] = $v->attributes;
            }
        } else {
            foreach($obj as $k=>$v) {
                $ret[$k] = array_filter($v->attributes,'strlen');
            }
        }
        return $ret;
    }

    /*
     * SQL查询
     * @param $sql：要执行的SQL语句
     * @param $binds：绑定的查询参数
     * @param $select：结果类型 execute-执行一个 SQL、row-返回一条数据、rows-返回多条数据、value-返回一个字段
     *
     * PS：flag：是否需要进行查询参数的绑定操作 0-不需要并且没有送入绑定参数 1-有查询参数但该操作不需要送入参数true 2-有查询参数并且该操作需要送入参数true
     */
    public function queryBySql($sql, $binds=null, $select='execute') {
        if(!$sql) return null;
        $db = Yii::app()->db;
        //查询方式
        $option = 'execute';
        //参数绑定
        $flag = 0;
        switch($select) {
            case 'execute':
                $option = 'execute';
                $flag = 1;
                break;

            case 'row':
                $option = 'queryRow';
                $flag = is_array($binds) ? 2 : 0;
                break;

            case 'rows':
                $option = 'queryAll';
                $flag = is_array($binds) ? 2 : 0;
                break;

            case 'value':
                $option = 'queryScalar';
                $flag = 1;
                break;
        }

        if($flag == 2) {
            return $db->createCommand($sql)->$option(true, $binds);
        } elseif($flag == 1) {
            return $db->createCommand($sql)->$option($binds);
        } else {
            return $db->createCommand($sql)->$option();
        }
    }
}
?>
