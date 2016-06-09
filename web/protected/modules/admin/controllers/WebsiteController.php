<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午9:38
 */
class WebsiteController extends HwAdminController
{
    public function actionindex()
    {
        $this->render('index');
    }
}