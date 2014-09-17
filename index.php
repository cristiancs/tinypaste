<?php
require_once('core/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
   <title><?php echo configval(3); ?></title>
   <meta name="description" content="Comparte tu texto con el mundo">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/global.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/tipsy.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/home.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/bootstrap.css" type="text/css" media="screen">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
   <script type="text/javascript">var root_url = '<?php echo configval(2) ?>';</script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.tipsy.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/tooltip.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/paste2.js"></script>
   <!--[if lt IE 7]>
    <script defer type="text/javascript" src="js/pngfix.js"></script>
   <![endif]-->
</head> 
<body> 
   <div id="wrapper" class="tpPagehome">
       <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1); ?>" alt="<?php echo configval(3); ?>"></a></div>
       <div id="homePage">
<div class="whiteBG rounded10 pad10">
<?
if(IsUser())
{
	if($_GET['key'] && $_GET['action']=='edit')
	{
	$sec="SELECT * FROM pastes WHERE slug='".$_GET['key']."' AND user='".$_SESSION['id']."'";
	$res=mysql_num_rows(mysql_query($sec));
	if($res>0)
	{
		if($_POST['titulo2'])
		{
			$u="UPDATE pastes SET paste='".$_POST['paste']."', titulo='".$_POST['titulo2']."', password='".$_POST['pass']."' WHERE slug='".$_GET['key']."'";
			if(mysql_query($u))
			{
				echo '<font size="7" color="green">Actualizado correctamente</font>';
			}else{
				echo "Error";
			}
		}
	
		$q="SELECT * FROM pastes WHERE slug='".$_GET['key']."' AND user='".$_SESSION['id']."'";
		$qq=mysql_query($q);
		if($row=mysql_fetch_array($qq))
		{
			require_once("FormE.php");
		}else{
			require_once("FormO.php");
		}
	}else{
	echo '<font size="7" color="red">No tiene permisos para editar</font>';
	}
	}else{
		require_once("FormO.php");
	}
}else{
require_once("FormO.php");
}
?>
</div></div>
   <script type="text/javascript" src="js/paste2.js"></script>

      <?php include('blocks/footer.php') ?>    </div>