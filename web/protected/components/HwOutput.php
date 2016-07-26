<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 20:34
 */
class HwOutput
{

    public static function messageOutPut($code, $msg, $isLogin=false,$data=array())
    {
        $returnData = array(
            'code' => $code,
            'isLogin' => $isLogin,
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