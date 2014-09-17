<?php
require_once('core/config.php');
if(!IsUser())
{
header ("Location: login");
}
if(DatoUser($_SESSION['id'],"rango")<2)
{
header ("Location: index.php");
}

if($_POST['Ccon'])
{
	if(configval(1)!=$_POST['logo'] && $_POST['logo']!="")
	{
		$Q1="UPDATE config SET value='".$_POST['logo']."' WHERE id='1'";
		mysql_query($Q1);
		echo "Logo actualizado";
	}
	
		if(configval(2)!=$_POST['dirraiz'] && $_POST['dirraiz']!="")
	{
		$Q2="UPDATE config SET value='".$_POST['dirraiz']."' WHERE id='2'";
		mysql_query($Q2);
		echo "Direcotio Raiz actualizado";
	}
	
		if(configval(3)!=$_POST['nsitio'] && $_POST['nsitio']!="")
	{
		$Q3="UPDATE config SET value='".$_POST['nsitio']."' WHERE id='3'";
		mysql_query($Q3);
		echo "Nombre del sitio actualizado";
	}
	
		if(configval(4)!=$_POST['tef'])
	{
		$Q4="UPDATE config SET value='".$_POST['tef']."' WHERE id='4'";
		mysql_query($Q4);
		echo "Titulo enlace footer Actualizado";
	}
	
		if(configval(5)!=$_POST['ef'])
	{
		$Q5="UPDATE config SET value='".$_POST['ef']."' WHERE id='5'";
		mysql_query($Q5);
		echo "Enlace Footer actualizado";
	}
	
		if(configval(6)!=$_POST['b728'])
	{
		$Q6="UPDATE config SET value='".$_POST['b728']."' WHERE id='6'";
		mysql_query($Q6);
		echo "Banner actualizado";
	}
}
?>
<!DOCTYPE html>
<head>
	<head>
	<meta charset="UTF-8">
  <title><?php echo configval(3) ?></title>
   <meta name="description" content="paste">
   <link rel="stylesheet" href="<?php echo configval(2)."/"; ?>css/global.css" type="text/css" media="screen">
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
 
</head>
<body>
   <div id="wrapper" class="tpPageview">
  <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1); ?>" alt="<?php echo configval(3); ?>"></a></div>

<div class="rounded10 whiteBG pad20">
		   <div class="bold blue font18">Configuración del sitio</div>
<br>

<div class="pad20">
<div class="font15 bold">Configurar Sitio</div>
<div class="pad20">
<form action="<? echo configval(2) ?>/manageconfig.php" method="post" autocomplete="off">
<input type="hidden" name="change_email" value="1">
   <div class="registerField">Logo</div>
   <div class="registerOption">
      <input type="url" class="rounded" name="logo" size="40" value="<?php echo configval(1); ?>">
   </div>
   <div class="clear"></div><br>
   <div class="registerField">Directorio Raiz:</div>
   <div class="registerOption">
      <input type="url" class="rounded" name="dirraiz" value="<?php echo configval(2); ?>"
   </div>
      <br>
   <div class="registerField">Nombre del sitio</div>
   <div class="registerOption">
      <input type="text" class="rounded" name="nsitio" value="<?php echo configval(3); ?>"
   </div>
   <div class="clear"></div>
   <div class="clear"></div>
      <br>
   <div class="registerField">Titulo enlace Footer</div>
   <div class="registerOption">
      <input type="text" class="rounded" name="tef" value="<?php echo configval(4); ?>"
   </div>
   <div class="clear"></div>
   <br>
   <div class="registerField">Enlace Footer</div>
   <div class="registerOption">
      <input type="text" class="rounded" name="ef" value="<?php echo configval(5); ?>"
   </div>
   <div class="clear"></div>
   <br>
   <div class="registerField">Banner 728x90</div>
   <div class="registerOption">
     <textarea class="rounded" name="b728"><?php echo configval(6); ?></textarea>
   </div>
   <div class="clear"></div>
   <br>
   
   <input type="submit" name="Ccon" class="rounded5 submit" value="Cambiar Configuracion">
</form>
</div>
</div>

		</div>
<?php include('blocks/footer.php'); ?>
		</body>