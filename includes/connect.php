<?php
 error_reporting(E_ERROR);
 ini_set('display_errors', 1);

// error_reporting(E_ERROR);
// ini_set('display_errors', 1);

session_start();
$conn = new mysqli('localhost','root', '', 'controle_financeiro');
$_SESSION['connection'] = $conn;
?>