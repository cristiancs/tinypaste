<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Instalador Clon TinyPaste</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="js/prefixfree.min.js"></script>
</head>
<body>
<?
$config=false;

if(file_exists("../core/mysql_connect.php"))
{
echo "Atencion! El archivo config ya existe.";
exit();
}

if($_POST['ins'])
{

if(!$config)
{
	if(!$_POST['mysqlser'] || !$_POST['mysqluser'] || !$_POST['mysqlpass'] || !$_POST['mysqldb'])
	{
		$error.="Los datos de coneccion son necesarios.";
	}else{
		if(!@mysql_connect($_POST['mysqlser'],$_POST['mysqluser'],$_POST['mysqlpass']))
		{
			$error.="Imposible conectar a la base de datos (Datos Mysql incorrectos?)";
		}else{
			if(!@mysql_select_db($_POST['mysqldb']))
			{
				$error.="Imposible seleccionar DB (Nombre incorrecto?)";
			}else{
				$nuevoarchivo = fopen('../core/mysql_connect.php', "w+");
				fwrite($nuevoarchivo,"<?php mysql_connect('".$_POST['mysqlser']."','".$_POST['mysqluser']."','".$_POST['mysqlpass']."'); mysql_select_db('".$_POST['mysqldb']."'); ?>");
				fclose($nuevoarchivo);
				
					$file_content = file("sql/v001.sql"); 
					foreach($file_content as $sql_line)
					{ 				
					if(trim($sql_line) != "" && strpos($sql_line, "--") == false)
						{         
							mysql_query($sql_line) or die(Mysql_error); 
						}
					}
				}
			}
		}
}

$SaltoFiltro=true;
include ("../core/config.php");
if($_POST['auser'] && $_POST['apassword'])
{
	$q="INSERT INTO users VALUES ('1','".$_POST['auser']."', 'admin@site.com','".md5($_POST['apassword'])."','2')";
	if(mysql_query($q))
	{
	$success.="Admin creado<br>";
	}
}else{
	$error.="Los datos de Admin son necesarios";
}

if($_POST['logo'] && $_POST['dirraiz'] && $_POST['titulo'])
{
	$q0="INSERT INTO config VALUES ('','0','0')";
	mysql_query($q0);
	
	$q1="INSERT INTO config VALUES ('1','logo','".$_POST['logo']."')";
	mysql_query($q1);
	
	$q2="INSERT INTO config VALUES ('2','dirraiz','".$_POST['dirraiz']."')";
	mysql_query($q2);
	
		$q3="INSERT INTO config VALUES ('3','nsitio','".$_POST['titulo']."')";
	mysql_query($q3);
	
		$q4="INSERT INTO config VALUES ('4','tef','".$_POST['nurlfooter']."')";
	mysql_query($q4);
	
		$q5="INSERT INTO config VALUES ('5','ef','".$_POST['eurlfooter']."')";
	mysql_query($q5);
	
		$q6="INSERT INTO config VALUES ('6','b728','".$_POST['b728']."')";
	mysql_query($q6);
	$success.="Configuracion correcta <br>";
}else{
$error.="La configuracion es necesaria<br>";
}

echo $error."<br>";
echo $success."<br>";
}
?>
	<form action="index.php" method="post">
		<section class="unidos">
		<h2>Datos MYSQL</h2>
		<table>
			<tr>
				<td>Servidor MYSQL</td>
				<td><input type="text" name="mysqlser"></td>
			</tr>
			<tr>
				<td>Usuario MYSQL</td>
				<td><input type="text" name="mysqluser"></td>
			</tr>
			<tr>
				<td>Contraseña MYSQL</td>
				<td><input type="text" name="mysqlpass"></td>
			</tr>
			<tr>
				<td>Base de datos MYSQL</td>
				<td><input type="text" name="mysqldb"></td>
			</tr>
		</table>
		</section>
		<section class="unidos">
			<h2>Datos Administrador</h2>
		<table>
			<tr>
				<td>Usuario</td>
				<td><input type="text" name="auser"></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="text" name="apassword"></td>
			</tr>
		</table>
		</section>
		<section class="unidos abajo">
		<h2>Configuración del sitio</h2>
		<table>
			<tr>
				<td>Logo</td>
				<td><input type="url" name="logo"></td>
			</tr>
			<tr>
				<td>Directorio Raiz</td>
				<td><input type="url" name="dirraiz"></td>
			</tr>
			<tr>
				<td>Titulo</td>
				<td><input type="text" name="titulo"></td>
			</tr>
			</table>
			<table>
			
			<tr>
				<td>Nombre URL Footer</td>
				<td><input type="text" name="nurlfooter"></td>
			</tr>
			<tr>
				<td>Enlace URL Footer</td>
				<td><input type="url" name="eurlfooter"></td>
			</tr>
			<tr>
				<td>Banner 728x90</td>
				<td><textarea name="b728"></textarea></td>
			</tr>
		</table>
		</section>
		<input type="submit" name="ins" value="Instalar">
	</form>
</body>
</html>