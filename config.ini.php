<?php
//settaggi dell'applicazione
header('Content-Type: text/html; charset=UTF-8'); #istruz. per html
header('Access-Control-Allow-Origin: *');
mb_internal_encoding('UTF-8');
set_time_limit(0);
//db test
error_reporting(E_ERROR);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('DB_NAME', 'gestionale');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DIR_UPLOAD', 'upload/');

define('DIR_BACKUP', 'backup/');
define('DIR_UPLOAD_PRAT', 'PRATNAUT/');
//sistema di autenticazione userame or email
define('AUTENTICATION', 'username');
//email admin
define('MAIL_ADMIN', '');
define('MAIL_AMMINISTRAZIONE', '');
$root=$_SERVER['DOCUMENT_ROOT'].'/pratiche_app';
define('__ROOT__', $root);

//define path cartella PRATICHE cartella locale
define('PRATNAUT', 'd:\xampp_php/htdocs/pratiche_app/PRATNAUT/');

//define path cartella ESPORTAZIONE
define('ESPORTA', '_Esportazioni/');



//path assoluta 
define('PATH_ABS', 'c:/xampp/htdocs/pratiche_app/');
//define costant cookie name

define('COOKIE_USER', 'pratiche_user');


define('TITLE_APP', 'CloudMaster');

$url_general="http://".$_SERVER['SERVER_NAME'].'/pratiche_app/';
define('URL_GEN', $url_general);


//testo anno
//define('ANNO_CORE', 2020); //test da togliere poi
define('ANNO_CORE', date('Y')); //in produzione
define('CURRENT_DATE', time());  //in produzione

//define('CURRENT_DATE', time()+ (80 * 24 * 60 * 60));  //questo dovrebbe portare al mese di gennaio

//moduli pubblici del software
$moduli_aut=array('home', '404', 'users', 'edit_utente', 'events');

?>
