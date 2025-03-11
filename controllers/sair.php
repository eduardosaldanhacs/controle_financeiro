<?php 

include('../includes/connect.php');
include('../define.php');

session_destroy();
header("Location:". SITE . "index.php?pag=login");
exit;

?>

