<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/3/26
 * Time: 12:21
 */
class HomeController extends CController
{
    public function __construct($id, $module)
    {
        parent::__construct($id, $module);
        $this->layout = HOME_LAY_OUT;
    }

    public function render($view, $data = null, $json = false, $return = false)
    {
        if ($json) {

        } else {
            parent::render($view, $data = null, $return = false);
        }
    }

}