<?php 

include('../includes/connect.php');
include('../define.php');
include('../includes/functions.php');


alertMessage('Sessão encerrada com sucesso', 'success');
header("Location:". SITE);
session_destroy();
exit;

?>

