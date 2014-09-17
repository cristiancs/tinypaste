<?php require_once('core/config.php'); ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <title><?php echo configval(3) ?></title>
   <meta name="description" content="paste">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/global.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/view.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/bootstrap.css" type="text/css" media="screen">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>js/facebox/facebox.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/tipsy.css" type="text/css" media="screen">
   <script>
	var root_url = "<?php echo configval(2) ?>";
	</script>   
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.tipsy.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/tooltip.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/jquery.tipsy.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/facebox/facebox.js"></script>
   <script type="text/javascript" src="<?php echo configval(2)."/"; ?>js/view.js"></script>  
   <!--[if lt IE 7]>
   <script defer type="text/javascript" src="<?php echo configval(2)."/"; ?>js/pngfix.js"></script>
   <![endif]-->
   <meta name="robots" content="noindex, nofollow, noarchive, nocache">		
</head>
<?php 
$q1 = mysql_query('SELECT * FROM pastes WHERE slug = "'.$_GET['slug'].'"') or die(mysql_error());
$f1 = mysql_fetch_array($q1); ?>
<body>
    <div id="wrapper" class="tpPageview">
  <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1); ?>" alt="<?php echo configval(3); ?>"></a></div>
<div id="buttonRow">
   <a id="share_paste" original-title="<div class='font11 center'>Compartelo con tus amigos</div>" href="javascript:socialNetwork('<?php echo $_GET['slug'] ?>');" class="btn"><i class="icon-share-alt"></i> Compartir</a>
   <a original-title="<div class='font11 center'>Guarda el Paste en tu PC</div>" href="<?php echo configval(2).'/paste-'.$_GET['slug'].'/save/'; ?>" class="btn"><i class="icon-download-alt"></i> Descargar</a>
   <a original-title="<div class='font11 center'>Ver el Paste en pantalla completa</div>" href="<?php echo configval(2); ?>/paste-<?php echo $_GET['slug'] ?>/fullscreen/" class="btn"><i class="icon-resize-full"></i> Fullscreen</a>
   <?
   if($f1['user']==$_SESSION['id'] || DatoUser($_SESSION['id'],"rango")>1)
   {
  ?>
  <a original-title="<div class='font11 center'>Borrar paste</div>" href="<?php echo configval(2); ?>/admin/<?php echo $_GET['slug'] ?>/borrar" class="btn"><i class="icon-remove"></i> Borrar</a>
  <?
   }
   ?>
</div>
<div class="clear"></div>
<div id="pastecontainer">
<div class="whiteBG rounded10 pad10">

<div class="blue font15 bold"><?php echo $f1['titulo'] ?></div>
<br>

<div>
<div class="testleft"> 	
 </div>

<div class="center">
</div>

 <div class="left"> </div>
 </div>

	<?php
	if($_SESSION['privatepass'] == $f1['password'] or $f1['password'] == ''){  ?>

<div class="rounded10" id="frameParent">
<iframe frameborder="0" id="pasteFrame" src="<?php echo configval(2)."/"; ?>fullscreen.php?key=<?php echo $_GET['slug'] ?>" width="100%" height="300px"></iframe>
</div>
	
   <?php }else{?>
	<div class="rounded10" id="frameParent" style="width:200px;margin:0 auto;height:160px">
		   <div class="regRow">
<strong>El paste es privado</strong>
<form action="<?php echo configval(2)."/"; ?>actions/viewprivate.php" method="post">
      <div class="registerField">Password:</div>
      <input type="hidden" value="<?php echo $_GET['slug'] ?>" name="slug">
      <div class="registerOption"><input class="rounded" size="20" type="text" name="password" <? if(DatoUser($_SESSION['id'],"rango")>1){ echo 'value="'.$f1["password"].'"'; } ?>></div>
</div>
   <div class="regRow">
      <div class="clear"></div>
   </div>
   <div class="pad5"></div>
   <input name="submit" type="submit" class="submit rounded5" value="Login">
</form>
   </div>
 <?php   } ?>
</div>

<div id="pasteLinks" class="pad10">
<?php if($_SESSION['id'] == $f1['user']){ ?>
   <a href="editar/<?php echo $_GET['slug'] ?>" id="new_version" original-title="<div class='font11 center'>Edita el Paste</div>" class="btn"><i class="icon-edit"></i> Editar</a>  
<?php } ?>
</div>
<div id="pasteInfo" class="roundBL10 roundBR10 whiteBG pad10">
   <div><span class="bold">Publicado:</span> hace 
   	<?php 
   	$published = $f1['fecha'];
   	$actual = time();
   	$resta = $actual-$published;
   	$minuto = 60;
   	$hora = 60*60;
   	$dia = 60*60*24;
   	$mes = 60*60*24*30;
   	$anio = 60*60*24*365;
   	if($resta < $minuto){
   		echo $resta.' segundos';
   	}
   	elseif($resta > $minuto && $resta < $hora){
   		$minutos = $resta/60;
   		echo floor($minutos).' minutos';
   		if($resta%60 != 0){
   			$segundos = $resta%60;
   			echo ' y '.$segundos.' segundos';
   		}
   	}
   	elseif($resta > $hora && $resta < $dia){
   		$horas = $resta/$hora;
			if($horas<2)
			{
		echo floor($horas).' hora';
			}else{
   		echo floor($horas).' horas';
			}
   	}
   	elseif($resta > $dia && $resta < $mes){
   		$dias = $resta/$dia;
   		echo floor($dias).' días';
   	}
   	elseif($resta > $mes && $resta < $anio){
   		$meses = $resta/$mes;
   		echo floor($meses).' meses';
   	}
   	elseif($resta > $anio){
   		$anios = $resta/$anio;
   		echo floor($anios).' años';
   	}
   	?> </div>
  <div><span class="bold">Autor:</span> <?php
  if(is_numeric($f1['user'])){
  $q3 = mysql_query('SELECT * FROM users WHERE id = '.$f1['user']);
  $f3 = mysql_fetch_array($q3);
  echo $f3['username'];
}else{
	echo $f1['user'];
}

if(DatoUser($_SESSION['id'],"rango")>1)
{
	if(!$f1['ip'])
	{
		$ipqq="Sin Ip";
	}else{
		$ipqq=$f1['ip'];
	}
	echo " ( ".$ipqq." ) ";
}
?>
</div></div>
<div class="clear"></div>
</div>

       <?php include('blocks/footer.php') ?>    </div>
 </body>
</html>