<?php
  //----- BDD -----//
  define("HOST_DB","localhost");
  define("USER_DB","root");
  define("BASE_DB","organid");
  //Windows
  define("PASSWD_DB","");
  //Mac
  //define("PASSWD_DB","root");

  try {
    $PDO = new PDO("mysql:host=".HOST_DB.";dbname=".BASE_DB."", USER_DB, PASSWD_DB);
    $PDO->exec("SET CHARACTER SET utf8");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(Exception $e) {
    die('Erreur : ' . $e->getMessage());
    exit();
  }
?>