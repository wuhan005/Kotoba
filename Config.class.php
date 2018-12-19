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

    public static $ID = 'root';
    public static $Password = '63a9f0ea7bb98050796b649e85481845';

    //Database config.
    public static $dbHost = 'localhost';
    public static $dbName = 'root';
    public static $dbPassword = 'root';
    public static $dbTable = 'Kotoba';

}