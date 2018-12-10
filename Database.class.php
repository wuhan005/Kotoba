<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/10
 * Time: 7:17 PM
 */

class Database{
    //To control the database of the kotoba.
    private $isInit = false;
    private $conn;

    private function __clone(){}       //Prevent the database to be cloned.

    public function __construct(){
        $this->Init();
    }

    public function Init(){
        if($this->isInit){
            if(!$this->conn = mysqli_connect(Config::$dbHost, Config::$dbName, Config::$dbPassword, Config::$dbTable)){
                Api::showError('数据库连接错误！');
            }
        }
    }

    public function AddKotoba(){

    }

}