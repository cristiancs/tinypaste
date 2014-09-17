<?php
require_once('../core/config.php');
$user = $_POST['usuario'];
$pass = $_POST['password'];

$q1 = mysql_query('SELECT * FROM users WHERE username = "'.$user.'" AND password = "'.md5($pass).'"');
if(@mysql_num_rows($q1) == 0){
	header('Location: ../login?error=1');
}
else{
	$f1 = mysql_fetch_array($q1);
	$_SESSION['id'] = $f1['id'];
	$_SESSION['username'] = $f1['username'];
	$_SESSION['email'] = $f1['email'];
	$_SESSION['pw'] = $f1['password'];
	header('Location: ../portal');
}