<?php

/**
 * Created by PhpStorm.
 * User: 毅
 * Date: 2016/3/16
 * Time: 18:58
 */
require 'vendor/autoload.php';
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;

class HwAdminController extends CController
{
    public $layout = 'common';

    public $userinfo = array();

    public $website = array();

    public function __construct($id, $module)
    {
        parent::__construct($id, $module);

        $this->userinfo = Yii::app()->session['AdminUserInfo'];
        if (empty($this->userinfo))
            header('Location:\admin\login');

        $this->getWebSite();
    }

    public function getMenu()
    {
        $menuList = ARAdminMenu::getMenu();
        $menus = array();
        foreach ($menuList as $key => $value) {
            $menus[$value['id']] = $value;
        }
        $controller = Yii::app()->controller->id;
        $function = Yii::app()->controller->getAction()->getId();
        $factory = new MenuFactory();
        $menu = $factory->createItem('My menu');
        $menu->setChildrenAttribute('class', 'sidebar-menu');
        foreach ($menus as $key => $value) {
            if ($value['parent_id'] == 0) {
                $menu->addChild($value['menu_name'], array('uri' => "/admin/{$value['controller']}/{$value['function']}"));
                $menu[$value['menu_name']]->setAttribute('class', 'treeview');
                $menu[$value['menu_name']]->setChildrenAttribute('class', 'treeview-menu');
                if ($controller == $value['controller'])
                    $menu[$value['menu_name']]->setAttribute('class', 'active');
            } else {
                $menu[$menus[$value['parent_id']]['menu_name']]->addChild($value['menu_name'], array('uri' => "/admin/{$value['controller']}/{$value['function']}"));
                if ($controller == $value['controller'] && $function == $value['function'])
                    $menu[$menus[$value['parent_id']]['menu_name']][$value['menu_name']]->setAttribute('class', 'active');
            }

        }
        $renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());
        return $renderer->render($menu);
    }

    public function getWebSite()
    {
        $website = ARWebsite::getWebSite();

        foreach ($website as $key => $value) {
            $this->website[$value['define_key']] = $value['value'];
        }
    }


}