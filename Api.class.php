<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:32 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Api{
    public function __construct(){
        header(' Content-Type: application/json; chartset=UTF-8');
    }

    //Show the error message.
    public static function showError($_msg = '未知错误！'){
        header('Content-Type: application/json; chartset=UTF-8');
        $return = array(
            'code' => 500,
            'data' => $_msg
        );

        echo(json_encode($return));
        die();
        return;
    }
}
