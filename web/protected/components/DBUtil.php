<?php
/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/3/26
 * Time: 12:21
 */

class DBUtil {

    /**
     * 查询单条,返回数组
     */
    public static function queryRow($sql, $queryR = true) {
        self::reconnect();
        if ($queryR) {
            $command = Yii::app()->db_r->createCommand($sql);
        } else {
            $command = Yii::app()->db->createCommand($sql);
        }
        return $command->queryRow();
    }
    
    /**
     * 查询,返回数组
     */
    public static function queryAll($sql, $queryR = true) {
        self::reconnect();
        if ($queryR) {
            $command = Yii::app()->db_r->createCommand($sql);
        } else {
            $command = Yii::app()->db->createCommand($sql);
        }
        return $command->queryAll();
    }

    /**
     * 支持绑定参数的查询,不能直接拼sql
     * @param type $sql
     * @param type $params
     */
    public static function queryBind($sql, $params = array(), $queryR = true) {
        self::reconnect();
        if ($queryR) {
            $command = Yii::app()->db_r->createCommand($sql);
        } else {
            $command = Yii::app()->db->createCommand($sql);
        }
        foreach ($params as $key => $val) {
            $command->bindParam($key, $val);
        }
        return $command->queryAll();
    }

    public static function exec($sql) {
        self::reconnect();
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute();
    }
    
    /**
     * 计算上次访问时间
     * @var type 
     */
    private static $lastTime = null;
    
    /**
     * 重新连接的时间间隔,秒
     */
    const LAST_TIME_INTERVAL = 10;
    
    /**
     * 在执行长时间脚本之前,需要重新连接一下,否则会丢失连接
     * @param type $timeout
     */
    public static function reconnect($force = false)
    {
        $thisTime = microtime(true);
        //计算上次调用和本次调用之间的时间差
        if (self::$lastTime == null) {
            self::$lastTime = $thisTime;
        }
        if ($thisTime - self::$lastTime > self::LAST_TIME_INTERVAL || $force) {
            $db = Yii::app()->getComponent('db');
            $db->setActive(false);
            $db->setActive(true);
            
            $dbr = Yii::app()->getComponent('db_r');
            $dbr->setActive(false);
            $dbr->setActive(true);
        }
        self::$lastTime = $thisTime;
        return 0;
    }
    
    

    /**
     * 根据str计算表的后缀,0~9
     * @param type $uid
     */
    public static function calcDBSuffix($str) {
        //return null;
        $ret = 0;
        if (empty($str)) {
            return $ret;
        }
        //如果是整型,取最后一位.如果是字符串,取小写字母序和a的差值
        else if (is_numeric($str)) {
            $ret = intval($str) % 10;
        } else if (is_string($str)) {
            $tmp = strtolower(substr($str, -1, 1));
            if (is_numeric($tmp)) {
                $ret = intval($tmp);
            } else {
                $ret = intval(abs(ord($tmp) - ord('a'))) % 10;
            }
        }
        return $ret;
    }
    /**
     * 检索条件的使用范围
     */
    const USER_CONDITION_ALL = 0;
    const USER_CONDITION_AREA = 1;
    const USER_CONDITION_CATE = 2;

    /**
     * 获得用户设置的区域和分类的条件的sql
     */
    public static function getUserCondition($condition = 0, $prefixArea = '', $prefixCate1 = '', $prefixCate2 = '')
    {
        static $ret = null;
        if ($ret !== null) {
            return $ret;
        }
        $area = AreaUtil::getArea();
        $cateid = (int)Yii::app()->request->getParam('cateid');
        $cate = BUCategory::getUserCategory();
        $cate1 = $cate['cate1id'];
        $cate2 = $cate['cate2id'];
        $tmpArr = array();
        if ($area && ($condition == self::USER_CONDITION_ALL || $condition == self::USER_CONDITION_AREA)) {
            $tmpArr[] = "{$prefixArea}areaid = {$area}";
        }
        if($cateid){
            if ($cateid && ($condition == self::USER_CONDITION_ALL || $condition == self::USER_CONDITION_CATE)) {
                $tmpArr[] = "{$prefixCate2}cate2 = {$cateid}";
            }
        }else{
            if ($cate1 && (($condition == self::USER_CONDITION_ALL || $condition == self::USER_CONDITION_CATE))) {
                $tmpArr[] = "{$prefixCate1}cate1 = {$cate1}";
            }
            if ($cate2 && ($condition == self::USER_CONDITION_ALL || $condition == self::USER_CONDITION_CATE)) {
                $tmpArr[] = "{$prefixCate2}cate2 = {$cate2}";
            }
        }
        if ($tmpArr) {
            $ret = ' AND ' . implode(' AND ', $tmpArr);
        } else {
            $ret = '';
        }
        return $ret;
    }
}
