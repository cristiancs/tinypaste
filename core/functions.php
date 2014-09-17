<?php
///////////
if (@$_SERVER) {  
	if (@$_SERVER["HTTP_X_FORWARDED_FOR"] ) {  
		$realip = @$_SERVER["HTTP_X_FORWARDED_FOR"];  
	} elseif ( @$_SERVER["HTTP_CLIENT_IP"] ) {  
		$realip = @$_SERVER["HTTP_CLIENT_IP"];  
	} else {  
		$realip = @$_SERVER["REMOTE_ADDR"];  
	}  
	} else {  
		if ( @getenv( 'HTTP_X_FORWARDED_FOR' ) ) {  
		$realip = @getenv( 'HTTP_X_FORWARDED_FOR' );  
		} elseif ( @getenv( 'HTTP_CLIENT_IP' ) ) {  
		$realip = @getenv( 'HTTP_CLIENT_IP' );  
		} else {  
		$realip = @getenv( 'REMOTE_ADDR' );  
		}  
	} 
define("UIP", $realip);
///////////
function configval($id){
	$q1 =mysql_query('SELECT * FROM config WHERE id = "'.$id.'"');
	$f1 = mysql_fetch_array($q1);
	return $f1['value'];
}

function IsUser(){
	if($_SESSION['id'] && $_SESSION['pw'])
	{
		$qry="SELECT * FROM users WHERE id='".$_SESSION['id']."' AND password='".$_SESSION['pw']."'";
		$resultado=mysql_num_rows(mysql_query($qry));
			if($resultado==1)
			{
				return true;
			}else{
				return false;
			}
	}else{
		return false;
	}
}

function DatoUser($id,$dato){
	$q="SELECT * FROM users WHERE id='".$id."'";
	$data=mysql_fetch_array(mysql_query($q));
	return $data[$dato];
}

if($SaltoFiltro){
}else{
  if(count($_GET)>0)
  {
   foreach($_GET as $key=>$value)
   {
      $value = strip_tags($value);
      $value = htmlspecialchars($value);
      $value = htmlentities($value,ENT_QUOTES,"UTF-8");
      $value = trim($value);
      $value = str_replace("<","&lt;", $value);
      $value = str_replace(">","&gt;", $value);
        if (get_magic_quotes_gpc())
        {
         $value = stripslashes($value);
        }            
     $value = mysql_real_escape_string($value);
 $_GET[$key]=$value;
   }
  }
   
  if(count($_POST)>0)
  {
   foreach($_POST as $key=>$value)
   {
     $value = strip_tags($value);
     $value = htmlspecialchars($value);
     $value = htmlentities($value,ENT_QUOTES,"UTF-8");
     $value = trim($value);
     $value = str_replace("<","&lt;", $value);
     $value = str_replace(">","&gt;", $value);
      if (get_magic_quotes_gpc())
       {
       $value = stripslashes($value);
       }            
     $value = mysql_real_escape_string($value);
$_POST[$key]=$value;
  }
 }
}
 
 function BBcode($texto){ 
   $texto = htmlentities($texto); 
   $a = array( 
      "/\[i\](.*?)\[\/i\]/is", 
      "/\[b\](.*?)\[\/b\]/is", 
      "/\[u\](.*?)\[\/u\]/is", 
	  "/\[s\](.*?)\[\/s\]/is", 
      "/\[img\](.*?)\[\/img\]/is", 
      "/\[url=(.*?)\](.*?)\[\/url\]/is",
	  "/\[color=(.*?)\](.*?)\[\/color\]/is",
	  "/\[size=(.*?)\](.*?)\[\/size\]/is"
   ); 
   $b = array( 
      "<i>$1</i>", 
      "<b>$1</b>", 
      "<u>$1</u>", 
	  "<s>$1</s>",
      "<img src=\"$1\" />", 
      "<a href=\"$1\" target=\"_blank\">$2</a>",
	  "<font color=\"$1\">$2</font>",
	  "<font size=\"$1\">$2</font>"
   ); 
   $texto = preg_replace($a, $b, $texto); 
   return $texto; 
}