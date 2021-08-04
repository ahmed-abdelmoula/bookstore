<?php
session_start();
//session_destroy();
if (isset($_SESSION['log'])&& isset($_SESSION['pass']))
{
unset($_SESSION['log']);
unset($_SESSION['pass']);	
}

if (isset($_SESSION['emailcl'])&& isset($_SESSION['passcl']))
{
	unset($_SESSION['emailcl']);
unset($_SESSION['passcl']);	
}


header('location:../../index.php');


?>