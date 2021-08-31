<?php

/**
 * class DB
 */
class DB
{

  public static function connect()
  {
    $db = new PDO("mysql:host=localhost;dbname=employee", "root", "");
    $db->exec("set names utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
  }
}


 ?>
