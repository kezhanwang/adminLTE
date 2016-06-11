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
        $templateData = array('result' => array(), 'page' => '');
        $this->render('list', $templateData);
    }

    public function actionadd()
    {
        $this->render('editor');
    }

    public function actioneditor()
    {
        $this->render('editor');
    }

    public function actionclass()
    {
        $templateData = array();
        $page = Yii::app()->request->getParam('page', 0);
        if ($page > 0){
            $page = $page-1;
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

            if (empty($check)){
                $data = array(
                    'class' => $class,
                    'status' => $status,
                    'create_time' => date('Y-m-d H:i:s'),
                );
                $result = ARArticleClass::addArticleClass($data);
                if ($result){
                    HwOutput::successOutput(1, '添加成功');
                }else{
                    HwOutput::errorOutput(0, '该分类添加失败');
                }
            }else{
                HwOutput::errorOutput(0, '该分类已经存在');
            }
            
        } else {
            $templateData = array('back' => '/admin/article/class', 'type' => '_classadd');
            $this->render('ClassEditor', $templateData);
        }
    }
    public function actionclassedit(){
        $id = Yii::app()->request->getParam('id',0);
        $class = Yii::app()->request->getParam('class', '');
        $status = Yii::app()->request->getParam('status', 0);
        $type = Yii::app()->request->getParam('type');
        if ($id == 0 || !is_numeric($id)){
            HwOutput::errorOutput(0, '信息错误');
        }
        if ($type == '_classedit'){
            $updateData = array(
                'class' => $class,
                'status' => $status,
            );
            $result = ARArticleClass::updateArticleClass($id, $updateData);
            if ($result){
                HwOutput::successOutput(1, '该分类更新成功');
            }else{
                HwOutput::errorOutput(0, '该分类更新失败');
            }
        }else{
            $templateData = array('back' => '/admin/article/class', 'type' => '_classedit');
            $templateData['info'] = ARArticleClass::getArticleClassById($id);
            $this->render('ClassEditor', $templateData);
        }
    }
}