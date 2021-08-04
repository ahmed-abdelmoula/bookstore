<?php
require_once("../Model/Class/admin.php");
session_start();
$a=new admin();
$log=$_POST['log'];
$pass=$_POST['pass'];
$res=$a->rechercher_admin($log,$pass);
$n=$res->fetchColumn(0);
if($n==0)
{
	
	echo"login incorrect";
}
else 
{
	$_SESSION['log']=$log;
	$_SESSION['pass']=$pass;
header('location:../../adminwork.php');	

	
}

?>