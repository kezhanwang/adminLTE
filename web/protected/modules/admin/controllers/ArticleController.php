<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/10
 * Time: 上午3:03
 */
class ArticleController extends HwAdminController
{
    public function actionindex()
    {
        $this->render('index');
    }

    public function actionlist()
    {
        $templateData = array();
        $page = (int)Yii::app()->request->getParam('page', 0);
        if ($page > 0)
            $page = $page - 1;

        $data = ARArticle::getArticleByLimit($page, 10);

        $templateData = array_merge($templateData, $data);
        $this->render('list', $templateData);
    }

    public function actionadd()
    {
        $title = trim(Yii::app()->request->getParam('title'));
        $shortTitle = trim(Yii::app()->request->getParam('short_title'));
        $simpleIntroduce = trim(Yii::app()->request->getParam('simple_introduce'));
        $class = trim(Yii::app()->request->getParam('class'));
        $content = trim(Yii::app()->request->getParam('content'));
        $status = (int)Yii::app()->request->getParam('status');
        $author = Yii::app()->request->getParam('author');
        $type = Yii::app()->request->getParam('type');

        if ($type == '_add') {
            $insert = array(
                'title' => $title,
                'short_title' => $shortTitle,
                'simple_introduce' => $simpleIntroduce,
                'class' => $class,
                'content' => $content,
                'status' => $status,
                'author' => $author,
                'create_time' => date('Y-m-d H:i:s'),
            );
            $result = ARArticle::addArticle($insert);
            if ($result) {
                header('Location:/admin/article/list');
            } else {
                HwOutput::errorOutput(0, '添加错误');
            }
        } else {
            $templateData = array();
            $templateData['class'] = ARArticleClass::getArticleClassByStatus();
            $this->render('editor', $templateData);
        }
    }

    public function actioneditor()
    {
        $id = Yii::app()->request->getParam('id');

        $title = trim(Yii::app()->request->getParam('title'));
        $shortTitle = trim(Yii::app()->request->getParam('short_title'));
        $simpleIntroduce = trim(Yii::app()->request->getParam('simple_introduce'));
        $class = trim(Yii::app()->request->getParam('class'));
        $content = trim(Yii::app()->request->getParam('content'));
        $status = (int)Yii::app()->request->getParam('status');
        $author = Yii::app()->request->getParam('author');
        $type = Yii::app()->request->getParam('type');

        if (!is_numeric($id) || is_null($id)) {
            header('Loaction:/admin/article/list');
        }

        if ($type == '_edit') {
            $update = array(
                'title' => $title,
                'short_title' => $shortTitle,
                'simple_introduce' => $simpleIntroduce,
                'class' => $class,
                'content' => $content,
                'status' => $status,
                'author' => $author,
            );

            $result = ARArticle::updateArticle($id, $update);
            if ($result){
                header('Location:/admin/article/list');
            }else{
                HwOutput::errorOutput(0, '添加错误');
            }
        } else {
            $templateData = array();
            $templateData['id'] = $id;
            $data = ARArticle::getArticleById($id);
            $templateData['info'] = (empty($data)) ? array() : $data;
            $templateData['class'] = ARArticleClass::getArticleClassByStatus();
            $this->render('editor', $templateData);
        }
    }

    public function actionclass()
    {
        $templateData = array();
        $page = Yii::app()->request->getParam('page', 0);
        if ($page > 0) {
            $page = $page - 1;
        }
        $data = ARArticleClass::getArticleClassByLimit($page, 10);
        $templateData['result'] = $data['result'];
        $templateData['page'] = $data['page'];
        $this->render('class', $templateData);
    }

    public function actionclassadd()
    {
        $class = Yii::app()->request->getParam('class', '');
        $status = Yii::app()->request->getParam('status', 0);
        $type = Yii::app()->request->getParam('type');

        if ($type == '_classadd') {
            if (strlen($class) > 50) {
                HwOutput::errorOutput(0, '分类设置长度过长');
            }

            $check = ARArticleClass::getArticleClassByClass($class);

            if (empty($check)) {
                $data = array(
                    'class' => $class,
                    'status' => $status,
                    'create_time' => date('Y-m-d H:i:s'),
                );
                $result = ARArticleClass::addArticleClass($data);
                if ($result) {
                    HwOutput::successOutput(1, '添加成功');
                } else {
                    HwOutput::errorOutput(0, '该分类添加失败');
                }
            } else {
                HwOutput::errorOutput(0, '该分类已经存在');
            }

        } else {
            $templateData = array('back' => '/admin/article/class', 'type' => '_classadd');
            $this->render('ClassEditor', $templateData);
        }
    }

    public function actionclassedit()
    {
        $id = Yii::app()->request->getParam('id', 0);
        $class = Yii::app()->request->getParam('class', '');
        $status = Yii::app()->request->getParam('status', 0);
        $type = Yii::app()->request->getParam('type');
        if ($id == 0 || !is_numeric($id)) {
            HwOutput::errorOutput(0, '信息错误');
        }
        if ($type == '_classedit') {
            $updateData = array(
                'class' => $class,
                'status' => $status,
            );
            $result = ARArticleClass::updateArticleClass($id, $updateData);
            if ($result) {
                HwOutput::successOutput(1, '该分类更新成功');
            } else {
                HwOutput::errorOutput(0, '该分类更新失败');
            }
        } else {
            $templateData = array('back' => '/admin/article/class', 'type' => '_classedit');
            $templateData['info'] = ARArticleClass::getArticleClassById($id);
            $this->render('ClassEditor', $templateData);
        }
    }
}