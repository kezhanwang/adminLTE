<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/3/26
 * Time: 13:27
 */
class IndexController extends HomeController
{
    public function actionIndex()
    {
        $this->render('index');
    }

}