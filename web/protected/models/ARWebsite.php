<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午9:41
 */
class ARWebsite extends CActiveRecord
{

    const TABLE_NAME = 'hw_website';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return self::TABLE_NAME;
    }
}