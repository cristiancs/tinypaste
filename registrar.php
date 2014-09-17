<?php 
require_once('core/config.php');
require_once('core/recaptchalib.php');
if(IsUser())
{
header ("Location: ".configval(2));
exit();
}

$publickey = "6Lf6T9USAAAAAIAKVRd1PPRBFGjYz91uzwrQh4bA"; ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo configval(3) ?></title>
	<meta name="description" content="Comparte tus paste a todo el mundo">
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/home.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/register.css" type="text/css" media="screen">
	<script type="text/javascript">var root_url = '<?php echo configval(2) ?>';</script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/paste.js"></script>
	<!--[if lt IE 7]>
   <script defer type="text/javascript" src="js/pngfix.js"></script>
   <![endif]-->
</head>
<body> 
    <div id="wrapper" class="tpPagehome">
       <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1); ?>" alt="<?php echo configval(3); ?>"></a></div>
       <div id="registration">



<div class="whiteBG rounded10 pad20">
<div class="blue bold font16 left">Registro</div>
<div class="right"><a href="login.php" class="linkButton"><img src="images/user.png" class="vtop" alt=""> Tengo una cuenta</a></div>
<div class="clear"></div>
<div class="pad5"></div>
				
<div id="registrationForm">
<form action="actions/registro.php" method="post">
   <input type="hidden" name="code" value="save">
   
   <div class="regRow">
      <div class="registerField">Username:</div>

      <div class="registerOption"><input class="rounded" required size="15" maxlength="15" type="text" name="username"> <span class="smallDetail">(A-Z,a-z,0-9)</span></div>
      <div class="clear"></div>
   </div>
   
   <div class="regRow">
      <div class="registerField">Email Address:</div>
      <div class="registerOption"><input class="rounded" required type="email" size="40" name="email"></div>
      <div class="clear"></div>

   </div>
   
   <div class="regRow">
      <div class="registerField">Password:</div>
      <div class="registerOption"><input class="rounded" required type="password" size="20" name="password"></div>
      <div class="clear"></div>
   </div>
   
   <div class="regRow">
      <div class="registerField">Re-type Password:</div>

      <div class="registerOption"><input class="rounded" required type="password" size="20" name="password2"></div>
      <div class="clear"></div>
   </div>
   
   <div class="regRow">
      <div class="registerField">Anti-Spam Code</div>
      <div class="registerOption bold">
         <?php
               echo recaptcha_get_html($publickey);
         ?>
      <div class="clear"></div>
   </div>    </div> 
<div class="clear"></div>
   <div class="pad5"></div>
   <input type="submit" name="submit" class="submit rounded5" value="Registrar">
   
</form>
</div>
</div>
</div>
      <?php include('blocks/footer.php'); ?>
       </div>    </div><iframe src="about:blank" style="height: 0px; width: 0px; visibility: hidden; border: none; ">This frame prevents back/forward cache problems in Safari.</iframe>
 
	<div id="shadowMeasureIt"></div><div id="divCoordMeasureIt"></div><div id="divRectangleMeasureIt"><div id="divRectangleBGMeasureIt"></div></div></body>
	</html>