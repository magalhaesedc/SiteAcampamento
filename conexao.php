<?php

header('Content-Type: text/html; charset=utf-8');

define('HOST', 'localhost');
define('USUARIO', 'id14070272_acampamento');
define('SENHA', 'id14070272_admin');
define('DBNAME', 'id14070272_acampamento');

$conexao = new PDO ('mysql:host=' . HOST. ';dbname=' . DBNAME . ';charset=utf8' , USUARIO, SENHA, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//include_once './functions.php';

//CREATE USER 'id14070272_acampamento'@'%' IDENTIFIED BY 'id14070272_admin';
//GRANT ALL PRIVILEGES ON * . * TO 'id14070272_acampamento'@'%';
//FLUSH PRIVILEGES;