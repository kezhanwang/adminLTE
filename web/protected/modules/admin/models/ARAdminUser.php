<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午5:50
 */
class ARAdminUser extends CActiveRecord
{

    const TABLE_NAME = 'hw_admin_user';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return self::TABLE_NAME;
    }

    public static function getUserInfoByUsernameAndPassword($username, $password)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from(self::TABLE_NAME)
            ->where('user_name=:user_name and pass_word=:pass_word', array(':user_name' => $username, ':pass_word' => $password))
            ->queryRow();

        if (empty($result))
            return false;
        else
            return $result;
    }

    public static function getUserInfoByPhoneAndPassword($phone, $password)
    {
        $result = Yii::app()->db->createCommand()
            ->select('*')
            ->from(self::TABLE_NAME)
            ->where('phone=:phone and pass_word=:pass_word', array(':phone' => $phone, ':pass_word' => $password))
            ->queryRow();

        if (empty($result))
            return false;
        else
            return $result;
    }

    public static function add($data)
    {
        if (empty($data))
            return false;

        $result = Yii::app()->db->createCommand()->insert(self::TABLE_NAME, $data);

        if ($result)
            return true;
        else
            return false;
    }
}