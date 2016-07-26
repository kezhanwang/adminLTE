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


    public static function getWebSite()
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->queryAll();
        return $result;
    }


    public static function getWebSiteList($page = 0, $pageSize = 10)
    {
        $limit = $page * $pageSize . ',' . $pageSize;
        $sql = "SELECT * FROM " . self::TABLE_NAME . " limit {$limit} ;";
        $result = Yii::app()->db_r->createCommand($sql)->queryAll();
        $total = self::getWebSite();
        $count = count($total);
        $page = new PageUtil($count, $pageSize);
        $pageshow = $page->showpage();

        $data = array(
            'result' => $result,
            'page' => $pageshow,
        );
        return $data;
    }

    public static function getWebSiteByParams($params)
    {
        extract($params);
        $where = '';

        if ($define_key)
            $where .= "  `define_key` = '{$define_key}'";

        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE {$where} ;";
        $result = Yii::app()->db_r->createCommand($sql)->queryAll();
        return $result;
    }

    public static function getWebSiteById($id)
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->where('id=:id', array(':id' => $id))->queryRow();
        return $result;
    }

    public static function updateData($id, $data)
    {
        $result = Yii::app()->db->createCommand()->update(self::TABLE_NAME, $data, 'id=:id', array(':id' => $id));
        return $result;
    }

    public static function insertData($insert)
    {
        $result = Yii::app()->db->createCommand()->insert(self::TABLE_NAME, $insert);
        return $result;
    }
}