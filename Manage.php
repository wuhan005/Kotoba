<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:42 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Router
$urlPathInfo = @explode('/', $_SERVER['PATH_INFO']);
$nowPage = @$urlPathInfo[2];       //Get the child page.

//Child page router
$childRouterTable = array(
    'Main' => 'load_mainpage',

    //Control part.
    'Add' => 'add_new_kotaba',
    'Edit' => 'edit_kotoba',
    'Delete' => 'delete_kotoba',
);

//Set default page.
if($nowPage == null){
    $nowPage = 'Main';
}

//Execute!
if(array_key_exists($nowPage, $childRouterTable)){
    $childRouterTable[$nowPage]();
}else{
    Api::showError('未找到页面');
}

function load_mainpage(){

}

function add_new_kotoba(){

}

function edit_kotaba(){

}

function delete_kotoba(){
    
}