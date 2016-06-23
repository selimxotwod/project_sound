<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 16/06/2016
 * Time: 14:30
 */
require_once __DIR__."/vendor/autoload.php";
try{
    $pdo = new \PDO("mysql:host=raphaelmjaroot.mysql.db;dbname=raphaelmjaroot","raphaelmjaroot","Histoire15");
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}