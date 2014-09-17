<?
include_once ("core/config.php");
$sql="SELECT * FROM pastes WHERE slug='".$_GET['key']."'";
$resultado=mysql_query($sql);
$datos=@mysql_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title><? echo $datos['titulo']; ?></title>
 <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/global.css" type="text/css" media="screen">
 <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/fullscreen.css" type="text/css" media="screen">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/fullscreen.js"></script>

</head>
<body>
<div id="fullwrapper" class="tpPageFullview">
<?
if(mysql_num_rows($resultado)==1)
{
	if(isset($_GET['key']))
	{
			if($datos['password']=='' OR $datos['password']==$_SESSION['privatepass'])
			{
			echo '<pre id="thepaste" class="prettyprint">';
				echo BBcode($datos['paste']);
			echo "</pre>";
			}else{
			 header (configval(2)."/paste-".$_GET['key']."/");
			 exit();
			}
	}else{
	echo "No hay nada para mostrar";
	}
}else{
echo "Sin resultados";
}
?>
<div class="clear"></div>
</div>
</body>
</html>