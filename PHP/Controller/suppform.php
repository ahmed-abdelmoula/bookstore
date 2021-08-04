<?php
require_once("../Model/Class/produit.php");
$p=new produit();
echo $_GET['id'];
$p->supp($_GET['id']);
header('location:../../listprod.php');
?>
