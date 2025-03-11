<?php
 error_reporting(0); 
 ini_set('display_errors', '0');
 ini_set('log_errors', '1'); 

// error_reporting(E_ERROR);
// ini_set('display_errors', 1);

session_start();
$conexao = new mysqli('localhost','root', '', 'sistema_ju');
?>