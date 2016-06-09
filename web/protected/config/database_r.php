<?php
/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/6/9
 * Time: 下午6:45
 */

// This is the database connection configuration.
return array(
    // uncomment the following lines to use a MySQL database
    'class'=>'CDbConnection',
    'connectionString' => 'mysql:host=localhost;dbname=hw',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'wangyi',
    'charset' => 'utf8',
);