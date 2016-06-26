<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午7:00
 */
require 'vendor/autoload.php';
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
class TestController extends HwAdminController
{
    public function actionAddAdminUser()
    {
        $data = array(
            'user_name' => 'wangyi0527',
            'pass_word' => md5('1234567890a' . '$&)%web'),
            'phone' => '15101013501',
            'create_time' => date('Y-m-d H:i:s'),
        );
        var_dump($data);

        $result = ARAdminUser::add($data);

        var_dump($result);

    }

    public function actionmenu(){
        $a = Yii::app()->controller->id;
        var_dump($a);
        $b = Yii::app()->controller->getAction()->getId();
        var_dump($b);
    }

    public function actionKnp()
    {
        $menuList = ARAdminMenu::getMenu();
        $menus = array();
        foreach ($menuList as $key=>$value) {
            $menus[$value['id']] = $value;
        }

        $factory = new MenuFactory();
        $menu = $factory->createItem('My menu');

        $menu->setChildrenAttribute('class', 'sidebar-menu');
        foreach ($menus as $key=>$value) {
            if ($value['parent_id'] == 0){
                $menu->addChild($value['menu_name'],array('uri' => "/admin/{$value['controller']}/{$value['function']}"));
                $menu[$value['menu_name']]->setAttribute('class', 'treeview');
                $menu[$value['menu_name']]->setChildrenAttribute('class', 'treeview-menu');
                if ($controller = Yii::app()->controller->id == $value['controller'])
                    $menu[$value['menu_name']]->setAttribute('class', 'active');
            }else{
                $menu[$menus[$value['parent_id']]['menu_name']]->addChild($value['menu_name'],array('uri' => "/admin/{$value['controller']}/{$value['function']}"));
            }

        }
        echo "<pre>";
        var_dump($menu);
        echo "</pre>";

//        $renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());
//        var_dump($renderer->render($menu));
    }
}