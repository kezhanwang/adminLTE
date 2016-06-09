<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午7:00
 */
class TestController extends HwAdminController
{
    public function actionAddAdminUser()
    {
        $data = array(
            'user_name' => 'wangyi0527',
            'pass_word' => md5('1234567890a' . '$&)%web'),
            'phone' => '15101013501',
            'create_time' => date('Y-m-d H:i:s'),
        );
        var_dump($data);

        $result = ARUser::add($data);

        var_dump($result);

    }

}