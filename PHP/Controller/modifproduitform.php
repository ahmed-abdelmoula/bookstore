<?php
require_once('../Model/Class/produit.php');
$p=new produit();
print_r($_POST);
$p->desig=$_POST["desig"];
$p->prix=$_POST["prix"];
$p->carac=$_POST["carac"];
$img = ($_FILES['image']['name']);
$p->img=$img;
$target = "../../images/books/".basename($img);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo"Image uploaded successfully";
  	}else{
  		echo"Failed to upload image";
  	}
$p->modifer($_POST["id"]);
header("location:../../listprod.php");

?>