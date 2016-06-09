<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 20:34
 */
class HwOutput
{

    public static function errorOutput($code, $msg, $data=array())
    {
        $returnData = array(
            'code' => $code,
            'status' => FALSE,
            'time' => time(),
            'msg' => $msg,
            'data' => $data,
        );
        echo self::json_encode($returnData);
        exit();
    }

    public static function successOutput($code, $msg, $data=array()){
        $returnData = array(
            'code' => $code,
            'status' => TRUE,
            'time' => time(),
            'msg' => $msg,
            'data' => $data,
        );
        echo self::json_encode($returnData);
        exit();
    }

    private static function json_encode($data = array())
    {
        return json_encode($data);
    }
}