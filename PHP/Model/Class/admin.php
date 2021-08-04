<?php
class admin
{
	public $fnam;
	public $lname;
	public $sub;
	public $mess;
	public $mail;
	

public function __construct()
{

}
	public function rechercher_admin($l,$p)
	{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="select count(*) from admin where login='$l'and motpass='$p' ";
	$res=$pdo->query($req)or print_r($pdo->errorInfo());
	return $res;
		
	}
	public function destruction()
	{
		session_destroy();
		
	}
	
	public function ajout_contact()
	{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="insert into co values ('','$this->fnam','$this->lname','$this->mail','$this->sub','$this->mess')";	
	$res=$pdo->exec($req)or print_r($pdo->errorInfo());
	
	}
	public function get_contact()
	{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="select * from co" ;
	$res=$pdo->query($req)or print_r($pdo->errorInfo());
	return $res;
		
	}
	public function suppcontact($n)
	{
	require_once('C:\xampp\htdocs\boighor-free-books-library-ecommerce-store\boighor\PHP\Model\Config\config.php');
	$cnx=new connexion();
	$pdo=$cnx->CNXbase();
	$req="DELETE FROM co where nbsuggestion='$n'" ;
	$res=$pdo->exec($req)or print_r($pdo->errorInfo());
	
		
	}
	
	
}
?>