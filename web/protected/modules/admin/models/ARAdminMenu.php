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
        $sql = "SELECT * FROM " . self::TABLE_NAME;
        $result = DBUtil::queryAll($sql);
        if ($result) {
            $menu = array();
            foreach ($result as $item) {
                $menu[$item['id']] = $item;
            }
            return $menu;
        } else {
            return array();
        }

    }
}