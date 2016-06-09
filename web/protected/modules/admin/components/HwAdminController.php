<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 18:58
 */
class HwAdminController extends CController
{
    public $layout = 'common';

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);

        $userInfo = Yii::app()->session['AdminUserInfo'];
        if (empty($userInfo))
            header('Location:\admin\login');

    }
}