<?php
require_once('core/config.php');
if(!IsUser())
{
header ("Location: login");
exit();
}

if($_GET['key'] && $_GET['action'])
{
	$q="SELECT * FROM pastes WHERE slug='".$_GET['key']."'";

	if($InfoKey=mysql_fetch_array(mysql_query($q)))
	{
		if($_GET['action']=="borrar")
		{
			if($_SESSION['id']==$InfoKey['user'] || DatoUser($_SESSION['id'],"rango")>1)
			{
				mysql_query("DELETE FROM pastes WHERE slug='".$_GET['key']."'");
				$con=" - paste-".$_GET['key']." eliminado";
        header('Location: ./');
			}else{
			$con=" - Usted no tiene permiso.";
      header('Location: ./');
			}
		}
	
	}else{
		$con=" - paste-".$_GET['key']." No existe";
    header('Location: ./');
	}
}
$SP="SELECT * FROM pastes WHERE user='".$_SESSION['id']."' ORDER BY id DESC";
$result=mysql_query($SP);
$total=mysql_num_rows($result);
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo configval(3); ?></title>
   	<meta name="description" content="Comparte tu texto con el mundo">
    <link rel="stylesheet" href="<?php echo configval(2)."/";?>css/global.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/bootstrap.css" type="text/css" media="screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript">var root_url = '<?php echo configval(2) ?>';</script>
    <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.js"></script>
   <!--[if lt IE 7]>
   <script defer type="text/javascript" src="/js/pngfix.js"></script>
   <![endif]-->
</head>
<body>  
    <div id="wrapper" class="tpPagesubmit">
       <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1) ?>" alt="Paste"></a></div>
       
  <div class="rounded10 whiteBG pad20">
      
      <div class="successfull">
        <div class="successfull-header">
          <img src="<?php echo configval(2); ?>/images/successfullheader.png">
          <h3>Lista de Pastes</h3>
          </div>
<?
if($total<1)
{
echo "Usted no tiene pastes actualmente";
}else{
echo '<ul class="lista">';
while($array=mysql_fetch_array($result))
{
if($array['password']!='')
{
$extra=" - Password: ".$array['password'];
}else{
$extra="";
}
echo '<li><a class="pastea" href="'.configval(2).'/paste-'.$array["slug"].'">'.configval(2).'/paste-'.$array["slug"].' </a><strong>'.$array["titulo"].'<p>'.$extra.'</p></strong>
<div class="btn-toolbar">
        <div class="btn-group">
          <a class="btn" alt="delete" href="'.configval(2).'/admin/'.$array["slug"].'/borrar"><i class="icon-trash"></i></a>
          <a class="btn" alt="edit" href="'.configval(2).'/editar/'.$array["slug"].'"><i class="icon-pencil"></i></a>
        </div>
			 </div>';

}

echo "</ul>";
}
?>
      </div>
<div class="clear"></div>

    </div>

<div class="clear"></div>

           <?php include('blocks/footer.php') ?>   </div>
 
  
<style>
.lista li{font-family:Verdana, Geneva, sans-serif;font-size:14px;}
</style>  </body>
</html>