<?php
session_start();
include("./autoloader.php");
//istanzio qui tutte le classi che mi servono singleton
$db= new DB();
$not=new Notifiche();
$utility=new Utility();
$aut =new Auth();



//version update del js cod
$versionUpdate=$utility->getDataxml();






if (!($aut->login()) and !isset($_SESSION['pratiche_login']))
{
	header("location: ./login.php");

}
$user=$_COOKIE[COOKIE_USER];
$row=$db->selectAll('utenti', array(AUTENTICATION=>$user));

foreach($row as $r){

	$id_loggata = $r['id'];
	$user_loggata=$db->getCampo('utenti', 'username', array('id'=>$id_loggata));
	$livello = strtolower($r['ruolo']);
	$nome_loggato = $r['nome'];
  $fotoprofilo=DIR_UPLOAD.$r['foto']; //deve essere un nome valido
	if($r['foto'] =='')    $fotoprofilo =DIR_UPLOAD.'no.png';
	$email_loggato=$r['email'];

}
$_SESSION['loggato']=$id_loggata;
//sito offline
$off=$db->getCampo('opzioni', 'value', array('nome'=>'offline'));
if($livello!= 'amministratore' and $off=='s') header("location: ./index.php?req=offline");

//controllo profilo



if (isset ( $_GET ['req'] )) {
	$req = $_GET ['req'];
	$subreq = $_GET ['subreq'];
} else if (isset ( $_POST ['req'] )) {
	$req = $_POST ['req'];
	$subreq = $_POST ['subreq'];
}

if(!isset($req)) $req="home";


if(!in_array($req, $moduli_aut)) header("location: ./index.php?req=404");


if (isset ( $_GET ['id'] )) {
  //se valorizzato recupero un record per i form di edit
	$id_tab=$_GET['id'];
}




?>
