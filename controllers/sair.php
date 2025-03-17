<?php 

include('../includes/connect.php');
include('../define.php');

session_destroy();
header("Location:". SITE);
exit;

?>

