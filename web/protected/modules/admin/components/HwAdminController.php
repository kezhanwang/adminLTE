<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 18:58
 */
class HwAdminController extends CController
{
    public $layout = 'common';

    public $userinfo = array();

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);

        $this->userinfo = Yii::app()->session['AdminUserInfo'];
        if (empty($this->userinfo))
            header('Location:\admin\login');
    }

    public function getMenu()
    {
        $menuList = ARAdminMenu::getMenu();
        $menu = array();
        foreach ($menuList as $key => $value) {
            if ($value['parent_id'] == 0) {
                $menu[$value['id']] = $value;
                $menu[$value['id']]['url'] = "/admin/{$value['controller']}/{$value['function']}";
                $menu[$value['id']]['children'] = array();
            }
        }

        foreach ($menuList as $key => $value) {
            if (isset($menu[$value['parent_id']])){
                $menu[$value['parent_id']]['children'][$value['id']] = $value;
                $menu[$value['parent_id']]['children'][$value['id']]['url'] = "/admin/{$value['controller']}/{$value['function']}";
            }
        }
        return $menu;
    }


}