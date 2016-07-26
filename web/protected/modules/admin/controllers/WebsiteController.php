<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午9:38
 */
class WebsiteController extends HwAdminController
{
    public function actionindex()
    {
        $this->render('index');
    }

    public function actionedit()
    {
        $id = (int)Yii::app()->request->getParam('id', 0);
        if (!is_numeric($id) || $id == 0) {

        }
        $key = Yii::app()->request->getParam('key', '');
        $value = Yii::app()->request->getParam('value', '');
        $desp = Yii::app()->request->getParam('desp', '');
        $type = Yii::app()->request->getParam('type', '');
        if ($type == '_edit') {
            if ($key == '' || $value == '' || $desp == '') {
                HwOutput::messageOutPut(0, '提交信息错误');
            }

            $data = array(
                'define_key' => $key,
                'value' => $value,
                'desp' => $desp,
            );
            $result = ARWebsite::updateData($id, $data);
            if ($result) {
                HwOutput::messageOutPut(1, '修改成功');
            } else {
                HwOutput::messageOutPut(0, '修改失败');
            }
        } else {
            $templateDate = array();
            $templateDate['data'] = ARWebsite::getWebSiteById($id);
            $templateDate['back'] = '/admin/website/index';
            $this->render('edit', $templateDate);
        }
    }

    public function actionadd()
    {
        $key = Yii::app()->request->getParam('key', '');
        $value = Yii::app()->request->getParam('value', '');
        $desp = Yii::app()->request->getParam('desp', '');
        $type = Yii::app()->request->getParam('type', '');
        if ($type == '_add') {
            if ($key == '' || $value == '' || $desp == '') {
                HwOutput::messageOutPut(0, '提交信息错误');
            }

            $check = ARWebsite::getWebSiteByParams(array('define_key' => $key));
            if (!empty($check)) {
                HwOutput::messageOutPut(0, '该配置已经存在');
            }

            $insert = array(
                'define_key' => $key,
                'value' => $value,
                'desp' => $desp,
                'create_time' => date('Y-m-d H:i:s')
            );
            $result = ARWebsite::insertData($insert);
            if ($result) {
                HwOutput::messageOutPut(1, '创建成功');
            } else {
                HwOutput::messageOutPut(0, '创建失败');
            }
        } else {
            $templateData = array(
                'back' => '/admin/website/index',
            );
            $this->render('add', $templateData);
        }
    }

    public function actionglobalset()
    {
        $templateData = array();
        $page = Yii::app()->request->getParam('page', 0);
        $data = ARWebsite::getWebSiteList($page, 10);
        $templateData['result'] = $data['result'];
        $templateData['page'] = $data['page'];
        $this->render('globalset', $templateData);
    }

    public function actionadminmenu()
    {
        $templateData = array();
        $menu = ARAdminMenu::getMenu();
        $this->render('adminmenu', $templateData);
    }
}