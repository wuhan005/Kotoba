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
    'Add' => 'add_new_kotoba',
    'Edit' => 'edit_kotoba',
    'Delete' => 'delete_kotoba',
    'GetLyric' => 'load_song_lyric'
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
    load_header();

    load_footer();
}

function add_new_kotoba(){
    load_header();
    require_once(BASEPATH . '/view/Add.php');
    load_footer();
}

function edit_kotaba(){

}

function delete_kotoba(){

}

//Tool Function

//Load the song lyric from qq music api.
function load_song_lyric(){

    if(isset($_GET['mid'])){
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, "https://c.y.qq.com/lyric/fcgi-bin/fcg_query_lyric.fcg?songmid={$_GET['mid']}&nobase64=1");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, 'https://y.qq.com/portal/player.html');

        $lyric = curl_exec($ch);
        curl_close($ch);

        var_dump($lyric);

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