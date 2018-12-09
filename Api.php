<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:32 PM
 */

class Api{
    public function __construct(){
        header('content:application/json;chartset=uft-8');
    }

    //Show the error message.
    public static function showError($_msg = '未知错误！'){
        $return = array(
            'code' => 500,
            'data' => $_msg
        );

        echo(json_encode($return));
        return;
    }
}
