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

    public function actionLogin()
    {
        $request = Yii::app()->getRequest();
        if ($request->isPostRequest) {
            $email = trim(addcslashes(Yii::app()->request->getParam('email', '')));
            $password = trim(addcslashes(Yii::app()->request->getParam('password', '')));
            if ($email == '' || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                //todo
            }

            if ($password == '') {

            }
            try{
                $loginResult = AdminLogin::adminLogin($email, $password);
            }catch(Exception $e){

            }
        }
    }
}