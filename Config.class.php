<?php
/**
 * Created by PhpStorm.
 * User: johnwu
 * Date: 2018/12/9
 * Time: 10:24 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Config{
    private function __construct(){}
    private function __clone(){}

    public static $token = 'KotobaAdmin';

    //Database config.
    public static $dbHost = 'localhost';
    public static $dbName = 'root';
    public static $dbPassword = 'root';
    public static $dbTable = 'Kotoba';

}