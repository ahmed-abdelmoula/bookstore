<?php
session_start();
if (($key = array_search($_GET['id'], $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
	  unset($_SESSION['prix'][$key]);
}

header('location:carte.php');

?>
