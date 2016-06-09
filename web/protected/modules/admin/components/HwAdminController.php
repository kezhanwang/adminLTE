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

    public $userinfo = array();

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);

        $this->userinfo = Yii::app()->session['AdminUserInfo'];
        if (empty($this->userinfo))
            header('Location:\admin\login');
    }
}