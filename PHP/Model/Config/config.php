<?php
class connexion
{
	

public function CNXbase()
{
	$user="root";
	$cnx=new PDO("mysql:host=localhost;dbname=books",$user);
	return $cnx;
	
}
}
?>