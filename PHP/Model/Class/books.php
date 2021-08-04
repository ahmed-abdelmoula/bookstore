<?php
class books
{
public $id;
public $nom;
public $pass;
public $email;
public $adress;
public $tel;
public $interet;

public function __construct()
{

} 
public function ajouter_client()
{
	
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
$req="insert into client values ('','$this->nom','$this->pass','$this->adress','$this->interet','$this->tel','$this->email')";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}	
public function consulter_client($l,$p)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select count(*) from client where email='$l' and motpass='$p'";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}
public function consulter_client_donnee($l,$p)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from client where email='$l' and motpass='$p'";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}




public function afficher_client($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from client where id='$id'";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}
public function afficher_tout_client()
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from client";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}


public function modiferclient($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="Update client set nom='$this->nom',adresse='$this->adress',centre_interets='$this->interet',tel='$this->tel',email='$this->email' where id='$id'";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}
public function suppclient($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="DELETE FROM client WHERE id='$id'";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}
}
?>