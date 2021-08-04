<?php
session_start();
require_once('../Model/Class/books.php');
$b=new books();
$b->nom=$_POST["NomU"];
$b->id=$_POST["ID"];
$b->email=$_POST["EmailU"];
$b->adress=$_POST["AdressU"];
$b->tel=$_POST["PhoneU"];
$tabinteret=$_POST["booksinteret"];
$ch=implode(",",$tabinteret);
$b->interet=$ch;
$b->modiferclient($_POST["ID"]);
session_destroy();
header('location:../../account_login.php');

?>