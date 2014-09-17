<?php require_once('core/config.php'); ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo configval(3) ?></title>
	<meta name="description" content="Comparte tus paste a todo el mundo">
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/home.css" type="text/css" media="screen">
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
       <div id="registration"><div class="whiteBG rounded10 pad20">
        <div class="blue bold left font16">Login</div>
        <div class="right"> <a href="register.php" class="linkButton">
            <img src="images/user_add.png" class="vtop" alt="">No tengo una cuenta</a></div>
      <div class="clear"></div>
      <div class="pad5"></div>
   <div id="registrationForm">
    <form action="actions/login.php" method="post">   
    <input type="hidden" name="form_sent" value="1">   
    <div class="regRow">      <div class="registerField">Username:</div>      <div class="registerOption"><input class="rounded" size="20" type="text" name="usuario"></div>      <div class="clear"></div>   </div>      <div class="regRow">      <div class="registerField">Password:</div>      <div class="registerOption"><input class="rounded" type="password" size="20" name="password"></div>      <div class="clear"></div>   </div>      <div class="pad5"></div>   <input type="submit" name="submit" class="submit rounded5" value="Login">      <br>   </form></div></div></div>
       <?php include('blocks/footer.php'); ?>  </div>
 
	<div id="shadowMeasureIt"></div><div id="divCoordMeasureIt"></div><div id="divRectangleMeasureIt"><div id="divRectangleBGMeasureIt"></div></div></body>
	</html>