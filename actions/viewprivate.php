<?php
require_once('../core/config.php');
$password = $_POST['password'];
$slug = $_POST['slug'];
$q1 = mysql_query("SELECT * FROM pastes WHERE slug = '".$slug."' AND password = '".$password."'");
if(@mysql_num_rows($q1) == 1){
	$_SESSION['privatepass'] = $password;
	header('Location: ../paste-'.$slug);
}else{
	header('Location: ../paste-'.$slug.'/1');
}
?>