<?php require('core/config.php');
$titulo = $_POST['titulo'];
$contenido = $_POST['paste'];
$pass = $_POST['pass'];
if($_SESSION['id']){
	$username = $_SESSION['id'];
}
else{
	$username = 'Anónimo';
}
if(!$contenido){
	header('Location: ../index.php?error=1');
}
else{
$str = "ABCDEFGHIJKLMNOPQRSTUV12345WXYZabcdefghijklmnopqrstuvwxyz67890";
$cad = "";
for($i=0;$i<8;$i++) {
$cad .= substr($str,rand(0,62),1);
} 
$qverify = mysql_query('SELECT slug FROM pastes WHERE slug = "'.$cad.'"');
if(mysql_num_rows($qverify) == 1){
	$cad = $cad+1;
}
mysql_query("INSERT INTO pastes (paste,titulo,slug,password,user,fecha,ip) VALUES ('".$contenido."', '".$titulo."','".$cad."','".$pass."','".$username."', '".time()."','".UIP."')") or die(mysql_error());
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo configval(3) ?></title>
	<meta name="description" content="Comparte tus paste a todo el mundo">
	<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">
	<script type="text/javascript">var root_url = '<?php echo configval(2) ?>';</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/zeroclipboard/ZeroClipboard.js"></script>
</head>
<body>
	<div id="wrapper" class="tpPagesubmit">
       <div id="header"><a href="<?php echo configval(2); ?>"><img id="logo" src="<?php echo configval(1) ?>" alt="Paste"></a></div>
       
	<div class="rounded10 whiteBG pad20">
			
			<div class="successfull">
				<div class="successfull-header">
					<img src="images/successfullheader.png">
					<h3>Paste guardado saticfactoriamente!</h3>

				</div>
				
				<div class="input-copy">
				<form>
					<input type="text" value="<?php echo configval(2)?>/paste-<?php echo $cad ?>" onchange="this.value='<?php echo configval(2)?>/paste-<?php echo $cad ?>'">
					<input type="button" value="Copy" class="btn" id="d_clip_button">
				</form>
				</div>
				
				<div class="meta">
					<ul>

				<li><img src="images/view-paste.png"> Ver paste: <a href="<?php echo configval(2)?>/paste-<?php echo $cad ?>"><b>Click aqui</b></a></li>		
			<li><img src="images/share-paste.png"> Compartilo: <img src="http://tinypaste.com/public/images/facebook.png"> <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo configval(2)?>/paste-<?php echo $cad ?>">Facebook</a> <img src="images/twitter.png"> <a target="_blank" href="http://twitter.com/home?status=<?php echo configval(2)?>/paste-<?php echo $cad ?>">Twitter</a></li>
					</ul>
				</div>
				
			</div>
<div class="clear"></div>

		</div>
<script type="text/javascript">
ZeroClipboard.setMoviePath( 'js/zeroclipboard/ZeroClipboard.swf' );
var clip = new ZeroClipboard.Client();
$(document).ready(function()
{
	$('#d_clip_button').mouseover(function()
	{
		clip.setText( "<?php echo configval(2)?>/paste-<?php echo $cad ?>" );
		clip.glue( 'd_clip_button' );
	});
});
</script>
<!-- end -->

<div class="clear"></div>

       <?php include('blocks/footer.php') ?>   </div>

</body>
</html>