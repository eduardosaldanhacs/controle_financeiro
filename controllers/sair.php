<?php 
include('../includes/essenciais.php');

alertMessage('Sessão encerrada com sucesso', 'success');
header("Location:". SITE . 'modulos/login.php');
exit;

?>

