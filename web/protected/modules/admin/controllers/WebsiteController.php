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
        $templateData = array();
        $page = Yii::app()->request->getParam('page', 0);
        $data = ARWebsite::getWebSiteList($page, 10);
        $templateData['result'] = $data['result'];
        $templateData['page'] = $data['page'];
        $this->render('index', $templateData);
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
                HwOutput::errorOutput(0, '提交信息错误');
            }

            $data = array(
                'key' => $key,
                'value' => $value,
                'desp' => $desp,
            );
            $result = ARWebsite::updateData($id, $data);
            if ($result) {
                HwOutput::successOutput(1, '修改成功');
            } else {
                HwOutput::errorOutput(0, '修改失败');
            }
        } else {
            $templateDate = array();
            $templateDate['data'] = ARWebsite::getWebSiteById($id);
            $templateDate['back'] = $_SERVER['HTTP_REFERER'];
            $this->render('edit', $templateDate);
        }
    }
}