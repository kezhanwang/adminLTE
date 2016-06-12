<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/12
 * Time: 上午12:17
 */
class ARArticle extends CActiveRecord
{
    const TABLE_NAME = 'hw_article';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return self::TABLE_NAME;
    }

    static public function addArticle($data = array())
    {
        if (empty($data))
            return false;

        $result = Yii::app()->db->createCommand()->insert(self::TABLE_NAME, $data);
        return $result;
    }

    static public function updateArticle($id = 0, $update = array())
    {
        if ($id = 0 || !is_numeric($id) || empty($update)) {
            return false;
        }
        $result = Yii::app()->db->createCommand()->update(self::TABLE_NAME, $update, 'id=:id', array(':id' => $id));
        return $result;

    }

    static public function getArticleByLimit($page = 0, $pageSize = 10)
    {
        $limit = $page * $pageSize . ',' . $pageSize;
        $sql = "SELECT * FROM " . self::TABLE_NAME . " limit {$limit} ;";
        $result = Yii::app()->db_r->createCommand($sql)->queryAll();
        $total = Yii::app()->db_r->createCommand()->select('COUNT(*) as num')->from(self::TABLE_NAME)->queryRow();
        $page = new PageUtil($total['num'], $pageSize);
        $pageshow = $page->showpage();

        $data = array(
            'result' => $result,
            'page' => $pageshow,
        );
        return $data;
    }

    static public function getArticleById($id)
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->where('id=:id', array(':id' => $id))->queryRow();
        return $result;
    }
}