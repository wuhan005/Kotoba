<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:32 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//t - type

if(isset($_GET['t'])){

    switch($_GET['t']){
        case 'simple':
            showSimple();
            break;
        case 'raw':
            showRaw();
            break;
    }
}


function showSimple(){
    global $db;

    echo($db->GetSingleKotoba()['Content']);
}

function showRaw(){
    header('Content-Type: application/json; chartset=UTF-8');
    global $db;
    $returnData = array(
        'code' => 200,
        'content' => $db->GetSingleKotoba()['Content'],
        'date'  => $db->GetSingleKotoba()['PublishDate']
    );
    $returnData = json_encode($returnData);

    echo($returnData);
}



class Api{
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
