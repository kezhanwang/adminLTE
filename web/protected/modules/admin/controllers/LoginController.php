<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 19:19
 */
class LoginController extends CController
{
    private $errorLoginMsg = '登录失败，请检查用户名密码';
    private $successLoginMsg = '登录成功，页面跳转中';
    const VIEW_PATH = 'index';

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);

        $session = Yii::app()->session['AdminUserInfo'];

        if (!empty($session))
            header('Location:/admin/index');

    }

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

            $user = new UserController($username, $password);

            try {
                $user->checkUsername();
                $user->checkPassword();
            } catch (Exception $e) {
                HwOutput::messageOutPut(LoginError, $this->errorLoginMsg, array());
            }

            try {
                $userInfo = $user->getUserInfo();
                Yii::app()->session['AdminUserInfo'] = $userInfo;
                HwOutput::messageOutPut(LoginSuccess, $this->successLoginMsg, array('url' => '/admin/index'));
            } catch (Exception $e) {
                HwOutput::messageOutPut(LoginError, $this->errorLoginMsg, array());
            }
        }
    }

    public function actionLogout()
    {
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
        header('Location:/admin/login');
    }
    
}