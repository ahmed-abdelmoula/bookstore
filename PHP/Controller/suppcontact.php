<?php
require_once("../Model/Class/admin.php");
$a=new admin();

$a->suppcontact($_GET['id']);
header('location:../../listcontact.php');
?>

