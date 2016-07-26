<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/10
 * Time: 下午10:21
 */
class ARArticleClass extends CActiveRecord
{
    const TABLE_NAME = 'hw_article_class';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return self::TABLE_NAME;
    }

    static public function getArticleClassByLimit($page, $pageSize = 10)
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

    static public function getArticleClassByClass($class)
    {
        $sql = "SELECT * FROM " . self::TABLE_NAME;
        if (is_array($class)) {
            $sql .= " WHERE `class` IN (" . implode(',', $class) . ");";
        } else {
            $sql .= " WHERE `class` = '{$class}';";
        }
        $result = Yii::app()->db_r->createCommand($sql)->queryAll();
        return $result;

    }

    static public function getArticleClassById($id)
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->where('id=:id', array(':id' => $id))->queryRow();
        return $result;
    }

    static public function getArticleClassByStatus($status = 0)
    {
        $result = Yii::app()->db_r->createCommand()->select('*')->from(self::TABLE_NAME)->where('status=:status', array(':status' => $status))->queryAll();
        return $result;
    }

    static public function addArticleClass($data = array())
    {
        if (empty($data))
            return false;

        $result = Yii::app()->db->createCommand()->insert(self::TABLE_NAME, $data);

        return $result;
    }

    static public function updateArticleClass($id, $data)
    {
        $result = Yii::app()->db->createCommand()->update(self::TABLE_NAME, $data, 'id=:id', array(':id' => $id));
        return $result;
    }
}