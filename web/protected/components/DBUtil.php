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
}
