<?php
require_once('../Model/Class/books.php');
$logcl=$_POST['emailcl'];
$passcl=$_POST['passcl'];
$b=new books();
$res=$b->consulter_client($logcl,$passcl);
$n=$res->fetchColumn(0);
if($n==0)
{
	header('location=accountcheckself.php');
}
else
{
session_start();
$_SESSION['emailcl']=$logcl;
$_SESSION['passcl']=$passcl;
header('location:../../clientwork.php');
	
}
	

?>