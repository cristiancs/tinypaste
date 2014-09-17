<?php
require_once('../core/config.php');
require_once('../core/recaptchalib.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$privatekey = "6Lf6T9USAAAAAImuscjWKjpr1wR2qlfreSIR919z";
$resp = recaptcha_check_answer ($privatekey,
                                 $_SERVER["REMOTE_ADDR"],
                                 $_POST["recaptcha_challenge_field"],
                                 $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
  header('Location: ../registrar?error=1');
 }
 elseif(!$username or !$email or !$password or !$password2){
	header('Location: ../registrar?error=2');
 }
 elseif($password != $password2){
 	header('Location: ../registrar?error=3');
 }
$q1 = mysql_query('SELECT * FROM users WHERE username = "'.$username.'"');
if(@mysql_num_rows($q1) == 1){
	header('Location: ../registrar?error=4');
}
$q2 = mysql_query('SELECT * FROM users WHERE email = "'.$email.'"');
if(@mysql_num_rows($q2) == 1){
	header('Location: ../registrar?error=5');
}
 else{
 	mysql_query('INSERT into users (username,email,password) VALUES ("'.$username.'", "'.$email.'", "'.md5($password).'")') or die(mysql_error());
 	$q3 = mysql_query('SELECT * FROM users where username = "'.$username.'"');
 	$f3 = mysql_fetch_array($q3);
 	$_SESSION['id'] = $f3['id'];
	$_SESSION['username'] = $f3['username'];
	$_SESSION['email'] = $f3['email'];
	$_SESSION['pw'] = $f3['password'];
	
 	header('Location: ../index.php?registro=true');
 }
