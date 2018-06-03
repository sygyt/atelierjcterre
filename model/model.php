<?php
require_once(File::build_path(array("config", "conf.php")));

class model{
  static public $pdo;

  static public function init(){
    $login = getenv('username');
    $hostname = getenv('host');
    $database_name = getenv('database');
    $password = getenv('password');

    try{
      self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch(PDOException $e) {
      echo $e->getMessage();
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      die();
    }
  }
}

model::init();