<?php

require_once('../Model/Class/produit.php');
$p=new produit();
$p->id=$_POST["id"];
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
	
  
  	
$id=$_POST["id"];
$res=$p->consulter_produit($_POST["id"]);
$n=$res->fetchColumn(0);
if($n==0)
{
$p->ajouter_produit();
//header("location:../../produit_information.php?id=".$id);
header("location:../../adminwork.php");

}

else
header('location:../../produitform.php');

?>