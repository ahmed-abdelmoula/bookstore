<?php
class produit
{
public $id;
public $desig;
public $prix;
public $carac;
public $img;


public function __construct()
{

} 
public function ajoutepanier($ch)
	{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from produit WHERE id IN ('$ch')";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
	}
	

public function modifer($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="Update produit set desig='$this->desig',prix='$this->prix',carac='$this->carac',img='$this->img' where id='$id'";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}
public function ajouter_produit()
{
	
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
$req="insert into produit values ('$this->id','$this->desig','$this->prix','$this->carac','$this->img')";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}
/*public function ajouter_produit()
{
	
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
$req="insert into produit (id,desig,prix,carac) values ('$this->id','$this->desig','$this->prix','$this->carac')";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}*/

public function afficher_tout_produit()
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from produit ";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}
public function consulter_produit($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select count(*) from produit where id='$id'";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}



public function afficher_produit($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
$cnx=new connexion();
$pdo=$cnx->CNXbase();
$req="select * from produit where id='$id'";
$res=$pdo->query($req)or print_r($pdo->errorInfo());
return $res;
}

public function supp($id)
{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="DELETE FROM produit WHERE id='$id'";
	$pdo->exec($req)or print_r($pdo->errorInfo());
}
}
?>