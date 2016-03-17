<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 19:19
 */
class LoginController extends HwAdminController
{
    private $errorLoginMsg = '登录失败，请检查用户名密码';
    private $successLoginMsg = '登录成功，页面跳转中';
    const VIEW_PATH = 'index';

    public function actionIndex()
    {
        $this->layout = 'login';
        $this->render(self::VIEW_PATH);
    }

    public function actionLogin()
    {
        $request = Yii::app()->getRequest();
        if ($request->isPostRequest && $request->isAjaxRequest) {
            $username = trim(Yii::app()->request->getParam('username', ''));
            $password = trim(Yii::app()->request->getParam('password', ''));
            if ($username == '' || strlen($username) < 6 || strlen($username) > 20 || $password == '' || strlen($password) < 6 || strlen($password) > 20) {
                HwOutput::errorOutput(LoginError, $this->errorLoginMsg, array());
            }
            try {
//                AdminLogin::adminLogin($username, $password);
                HwOutput::successOutput(LoginSuccess, $this->successLoginMsg, array('url' => '/admin/index'));
            } catch (Exception $e) {
                HwOutput::errorOutput(LoginError, $this->errorLoginMsg, array());
            }
        }
    }

    public function actionLogout()
    {

    }
}