<?php 
include('../includes/essenciais.php');
$id = $_GET['id'];
$excluir_lancamentos = "UPDATE tb_lancamentos SET excluido = 'S' WHERE id = '$id'";

if (mysqli_query($conn, $excluir_lancamentos)) {
    alertMessage('Despesa excluida com sucesso!', 'success');
    header("Location:". SITE ."lancamentos");
    exit;
}else{
    alertMessage('Erro ao excluir despesa!', 'danger');
    header("Location:". SITE ."lancamentos");
    exit;
}
?>