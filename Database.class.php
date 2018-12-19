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
        if(!$this->isInit){
            if(!$this->conn = mysqli_connect(Config::$dbHost, Config::$dbName, Config::$dbPassword, Config::$dbTable)){
                Api::showError('数据库连接错误！');
            }
        }
    }

    public function AddKotoba($_content){
        $date = date("Y/m/d");
        return mysqli_query($this->conn, "INSERT INTO `Kotoba` (`ID`, `Content`, `PublishDate`) VALUES (NULL, '{$_content}', '{$date}');");
    }

    public function DeleteKotoba($_ID){
        mysqli_query($this->conn, "DELETE FROM `Kotoba` WHERE `ID` = $_ID");
        return;
    }

    public function GetSingleKotoba(){
        //Random select one kotoba.
        $data = $this->conn->query("SELECT * FROM `Kotoba` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(`ID`) FROM `Kotoba`)-(SELECT MIN(`ID`) FROM `Kotoba`))+(SELECT MIN(`ID`) FROM `Kotoba`)) AS `ID`) AS t2 WHERE t1.ID >= t2.ID ORDER BY t1.ID LIMIT 1");
        return $data->fetch_assoc();
    }

    public function GetAllKotoba(){
        $data = $this->conn->query('SELECT * FROM `Kotoba`');

        return $data->fetch_all(MYSQLI_BOTH);
    }

}