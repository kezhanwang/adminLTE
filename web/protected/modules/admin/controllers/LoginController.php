<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 19:19
 */
class LoginController extends HwAdminController
{
    const VIEW_PATH = 'index';
    public function actionIndex()
    {
        $this->layout = 'login';
        $this->render(self::VIEW_PATH);
    }
}