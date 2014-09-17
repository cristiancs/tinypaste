<?php
require_once('mysql_connect.php');
require_once('functions.php');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8'); 
session_start();
?>