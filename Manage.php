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
    'Login' => 'login',

    //Control part.
    'OnLogin' => 'on_login',
    'OnLogout' => 'on_logout',

    'Add' => 'add_new_kotoba',
    'Edit' => 'edit_kotoba',
    'GetLyric' => 'load_song_lyric',
    'AddKotoba' =>  'add',
    'DeleteKotoba' => 'delete',
);

//Set default page.
if($nowPage == null){
    $nowPage = 'Edit';
}

//Execute!
if(array_key_exists($nowPage, $childRouterTable)){
    $childRouterTable[$nowPage]();
}else{
    Api::showError('未找到页面');
}

function login(){
    load_header();
    require_once(BASEPATH . '/view/Login.php');
    load_footer();
}

function add_new_kotoba(){
    check_login();

    load_header();
    require_once(BASEPATH . '/view/Add.php');
    load_footer();
}

function edit_kotoba(){
    check_login();

    global $db;

    load_header();
    $kotobaData = $db->GetAllKotoba();
    require_once(BASEPATH . '/view/Edit.php');
    load_footer();
}

//Action

function on_login(){
    session_start();
    if(isset($_POST['ID'], $_POST['Password'])){
        $id = $_POST['ID'];
        $password = $_POST['Password'];

        if($id === Config::$ID AND md5($password) === Config::$Password){
            $_SESSION['ID'] = $id;
            $_SESSION['Password'] = $password;
            $_SESSION['isLogin'] = true;

            header('Location:/Manage/Edit');
        }else{
            header('Location:/Manage/Login');
        }
    }
}

function check_login(){
    session_start();
    if(isset($_SESSION['ID'], $_SESSION['Password'], $_SESSION['isLogin'])){
        $id = $_SESSION['ID'];
        $password = $_SESSION['Password'];

        if(!($id === Config::$ID AND md5($password) === Config::$Password)){
            header('Location:/Manage/Login');
            die();
        }

    }else{
        header('Location:/Manage/Login');
        die();
    }
}

function on_logout(){
    session_start();
    unset($_SESSION['ID']);
    unset($_SESSION['Password']);
    $_SESSION['isLogin'] = false;
}

//Add data.
function add(){
    check_login();

    global $db;

    if(isset($_POST['Content'])){
        $db->AddKotoba($_POST['Content']);
    }else{
        Api::showError('缺少参数');
    }
}

function delete(){
    check_login();

    global $db;

    if(isset($_GET['ID'])){
        $db->DeleteKotoba($_GET['ID']);
        header('Location:/Manage/Edit');
    }else{
        Api::showError('缺少参数');
    }
}

//Tool Function

//Load the song lyric from qq music api.
function load_song_lyric(){
    //header('Content-Type: application/json; chartset=UTF-8');

    if(isset($_GET['mid'])){
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, "https://c.y.qq.com/lyric/fcgi-bin/fcg_query_lyric.fcg?songmid={$_GET['mid']}&nobase64=1");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, 'https://y.qq.com/portal/player.html');

        $lyric = curl_exec($ch);
        curl_close($ch);

        echo($lyric);

    }else{
        Api::showError('缺少参数');
    }


}

function load_header(){
    require_once(BASEPATH . '/view/templete/Header.php');
}

function load_footer(){
    require_once(BASEPATH . '/view/templete/Footer.php');
}