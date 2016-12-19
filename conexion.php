<?php
session_start();

$_SESSION["login_done"] = false;
// datos para la coneccion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','CTW_db');
define('DB_USER','admin');
define('DB_PASS','CTW12345aA');

$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con);
?>