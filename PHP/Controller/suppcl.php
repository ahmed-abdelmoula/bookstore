<?php
require_once('../Model/Class/books.php');
$b=new books();
$b->suppclient($_GET['id']);
header('location:../../listclient.php');
?>