<?php
/*
 * tutte le classi vanno incluse in questo file
 * 
 */
//includo le costanti

//in locale setto config.ini.test

    include('./config.ini.php');



function my_autoloader($class) {
include './class/class.'.strtolower($class) . '.php';
}

spl_autoload_register('my_autoloader');
?>