<?php
require_once("../Model/Class/admin.php");

$a=new admin();
$a->fnam=$_POST['firstname'];
$a->lname=$_POST['lastname'];
$a->mail=$_POST['email'];
$a->sub=$_POST['subject'];
$a->mess=$_POST['message'];
$a->ajout_contact();
header('location:../../contact.php');

?>