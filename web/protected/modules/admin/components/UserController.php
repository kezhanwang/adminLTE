<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午5:31
 */
class UserController
{
    const TYPE_USER_NAME = 1;
    const TYPE_USER_PHONE = 2;
    const ENCRYPTION_STRING = '$&)%web';

    public $userNameStrLenMax = 20;
    public $userNameStrLenMin = 8;

    public $passwordStrLenMax = 20;
    public $passwordStrLenMin = 8;

    private $username = null;
    private $password = null;
    private $type = 1;

    public $userInfo = array();

    public function __construct($userName, $passWord)
    {
        $this->username = $userName;
        $this->password = $passWord;
    }

    public function checkUsername()
    {
        $strLen = strlen($this->username);
        if ($strLen < $this->userNameStrLenMin || $strLen > $this->userNameStrLenMax)
            throw new Exception('用户名长度错误');

        if (preg_match("/^[a-zA-Z0-9]{8,20}$/", $this->username))
            return true;
        else
            throw new Exception('用户名格式错误');
    }

    public function checkPassword()
    {
        $strLen = strlen($this->password);
        if ($strLen < $this->passwordStrLenMin || $strLen > $this->passwordStrLenMax)
            throw new Exception('密码长度错误');

        if (preg_match("/^[a-zA-Z0-9]{8,20}$/", $this->password))
            return true;
        else
            throw new Exception('密码格式错误');
    }

    public function getUserInfo()
    {
        $this->password = $this->encryptionPassword($this->password);

        $this->judgeUsername();

        switch ($this->type) {
            case self::TYPE_USER_NAME:
                $this->userInfo = ARUser::getUserInfoByUsernameAndPassword($this->username, $this->password);
                break;
            case self::TYPE_USER_PHONE:
                $this->userInfo = ARUser::getUserInfoByPhoneAndPassword($this->username, $this->password);
                break;
            default:
                $this->userInfo = ARUser::getUserInfoByUsernameAndPassword($this->username, $this->password);
                break;
        }

        if (empty($this->userInfo))
            throw new Exception('未查询到相关用户信息');
        else
            return $this->userInfo;

    }

    private function encryptionPassword($password)
    {
        $encryptionPassword = md5($password . self::ENCRYPTION_STRING);
        return $encryptionPassword;
    }

    public function judgeUsername()
    {
        if (preg_match("/^1[34578]\d{9}$/", $this->username)) {
            $this->type = self::TYPE_USER_PHONE;
        } else {
            $this->type = self::TYPE_USER_NAME;
        }
    }

}