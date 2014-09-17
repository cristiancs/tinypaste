<?
include_once ("core/config.php");
if(IsUser())
{
session_destroy();
}
header("Location: ".configval(2))
?>