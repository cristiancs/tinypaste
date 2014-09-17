<html>
<body>
<?
include("core/config.php");
$contenido=BBcode($_POST['dato']);
$contenido2=str_replace("\\n","<br>",$contenido);
//$contenido2=nl2br($_POST['dato']);
?>
	<?php echo $contenido2 ?>
</body>
</html>