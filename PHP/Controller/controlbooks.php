<?php

require_once('../Model/Class/books.php');
$b=new books();
$b->nom=$_POST["NomU"];
$b->pass=$_POST["Pass"];
$b->email=$_POST["EmailU"];
$b->adress=$_POST["AdressU"];
$b->tel=$_POST["PhoneU"];
$tabinteret=$_POST["booksinteret"];
$ch=implode(",",$tabinteret);
$b->interet=$ch;
$id=$_POST["ID"];
$res=$b->consulter_client($_POST["EmailU"],$_POST["Pass"]);
$n=$res->fetchColumn(0);
if($n==0)
{
$b->ajouter_client();
//header("location:../../my_account_information.php?id=".$id);
header("location:../../account_login.php");

}
else
header('location:../../accountcheckself.php');

?>