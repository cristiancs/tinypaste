<?php
require_once('core/config.php');
if(!IsUser())
{
header ("Location: login");
}

if($_POST['Aemail'])
{
	if($_POST['current_pass'])
	{
		$pw=md5($_POST['current_pass']);
		$r="SELECT * FROM users WHERE id='".$_SESSION['id']."' AND password='".$pw."'";
			if($row=mysql_fetch_array(mysql_query($r)))
			{
			//
				$a="UPDATE users SET email='".$_POST['email']."' WHERE id='".$_SESSION['id']."'";
				mysql_query($a);
				$_SESSION['email']=$_POST['email'];
				echo '<font color="green" size="7"><b>Email Actualizado</b></font>';
			//
			}else{
				echo '<font color="red" size="7"><b>Las contraseña actual es incorrecta</b></font>';
			}
	}else{
		echo '<font color="red" size="7"><b>Contraseña actual necesaria</b></font>';
	}
}

if($_POST['Apass'])
{
	if($_POST['current_pass'])
	{
		$pw=md5($_POST['current_pass']);
		$r="SELECT * FROM users WHERE id='".$_SESSION['id']."' AND password='".$pw."'";
		if($_POST['password']==$_POST['password2'])
		{
			if($row=mysql_fetch_array(mysql_query($r)))
			{
			//
				$a="UPDATE users SET password='".md5($_POST['password'])."' WHERE id='".$_SESSION['id']."'";
				mysql_query($a);
				$_SESSION['pw']=md5($_POST['password']);
				echo '<font color="green" size="7"><b>Password Actualizado</b></font>';
			//
			}else{
				echo '<font color="red" size="7"><b>Contraseña actual incorrecta</b></font>';
			}
		}else{
		echo '<font color="red" size="7"><b>Las nuevas password no coinciden</b></font>';
		}
	}else{
		echo '<font color="red" size="7"><b>Contraseña actual necesaria</b></font>';
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
		   <div class="bold blue font18">Mi cuenta</div>
<br>

<div class="pad20">
<div class="font15 bold">Actualizar email</div>
<div class="pad20">
<form action="<? echo configval(2) ?>/myaccount" method="post" autocomplete="off">
<input type="hidden" name="change_email" value="1">
   <div class="registerField">Direccion de email:</div>
   <div class="registerOption">
      <input type="text" class="rounded" name="email" size="40" value="<? echo $_SESSION['email']; ?>">
   </div>
   <div class="clear"></div><br>
   <div class="registerField">Contraseña actual:</div>
   <div class="registerOption">
      <input type="password" class="rounded" name="current_pass" value="">
   </div>
   <div class="clear"></div>
   <br>
   <input type="submit" name="Aemail" class="rounded5 submit" value="Actualizar email">
</form>
</div>
</div>

<div class="pad20">
<div class="font15 bold">Cambiar Password</div>
<div class="pad20">
<form action="<? echo configval(2) ?>/myaccount" method="post" autocomplete="off">
<input type="hidden" name="change_pass" value="1">
   <div class="registerField">Password Actual:</div>
   <div class="registerOption">
      <input type="password" class="rounded" name="current_pass" value="">
   </div>
   <div class="clear"></div>
   <br>
   <div class="registerField">Nueva Password:</div>
   <div class="registerOption">
      <input type="password" class="rounded" name="password" value="">
   </div>
   <div class="clear"></div>
   <br>
   <div class="registerField">Re-Escriba la nueva password:</div>
   <div class="registerOption">
      <input type="password" class="rounded" name="password2" value="">
   </div>
   <div class="clear"></div><br>
   <input type="submit" name="Apass" class="rounded5 submit" value="Cambiar Password">
</form>
</div>
</div>

		</div>
<?php include('blocks/footer.php'); ?>
		</body>