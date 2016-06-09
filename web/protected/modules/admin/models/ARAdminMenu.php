<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午8:02
 */
class ARAdminMenu extends CActiveRecord
{

    const TABLE_NAME = 'hw_admin_menu';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return self::TABLE_NAME;
    }

    public static function getMenu()
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->queryAll();
        return $result;
    }
}