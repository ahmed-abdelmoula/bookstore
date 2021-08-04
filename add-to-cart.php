<?php
session_start();
if(empty($_SESSION['cart']))
{
$_SESSION['cart']=array();	
$_SESSION['prix']=array();	
}
array_push($_SESSION['cart'],$_GET['id']);
array_push($_SESSION['prix'],$_GET['prix']);

header('location:carte.php');
?>
