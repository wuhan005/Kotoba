<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:22 PM
 */

//The entrance of the kotoba.

//Load the config file.
require_once('Config.php');

//Load the Api output part.
require_once('Api.php');

//URL Router
$urlPathInfo = @explode('/', $_SERVER['PATH_INFO']);
$nowPage = @$urlPathInfo[1];
if($nowPage == null){
    //If it is /index.php, then go to the mainpage.
    $nowPage = 'Manage';
}

$pages = ['Manage', 'Add', 'Api'];

if(in_array($nowPage, $pages)){
    require_once($nowPage . 'php');
}else{
    Api::showError('未找到页面');
}
