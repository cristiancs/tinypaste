<?php require_once('core/config.php'); 
$slug = $_GET['key'];
if($lug != ''){
	alert('ASD');
}
$q1 = mysql_query('SELECT * FROM pastes WHERE slug = "'.$slug.'"');
$f1 = mysql_fetch_array($q1);
if(mysql_num_rows($q1) == 0){
	echo '<script>alert("El paste que buscas no existe.")</script>';
	header('Location: '.configval(2));
}
elseif(!$_SESSION['privatepass'] && $f1['password'] != "" or $_SESSION['privatepass'] != $f1['password']){
	echo '<script>alert("La contraseña ingresada es incorrecta.")</script>';
}
else{
	if(!$f1['titulo']){
		$nombre = $slug.'.txt'; // Nombre del archivo
	}
	else{
		$nombre = $f1['titulo'].'.txt';
	}
		$contenido = $f1['paste'];
		header( "Content-Type: application/octet-stream");
		header( "Content-Disposition: attachment; filename=".$nombre.""); 
		print($contenido);
		//header('Location: '.configval(2).'/paste-'.$slug);
}