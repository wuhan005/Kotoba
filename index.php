<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:22 PM
 */

//The entrance of the kotoba.

define('BASEPATH', dirname(__FILE__));

//Load the config file.
require_once('Config.class.php');

//Load the database;
require_once('Database.class.php');
$db = new Database();

//Load the Api.class output part.
require_once('Api.class.php');

//URL Router
//Get the now page.
$urlPathInfo = @explode('/', $_SERVER['PATH_INFO']);
$nowPage = @$urlPathInfo[1];

//Set the default page.
if($nowPage == null){
    //If it is /index.php, then go to the api.
    $nowPage = 'Api';
}

//The router table.
$router = array(
    'Api' => 'Api.class.php',
    'Manage' => 'Manage.php',
);

//Load the page.
if(array_key_exists($nowPage, $router)){
    require_once($router[$nowPage]);
}else{
    Api::showError('未找到页面');
}
