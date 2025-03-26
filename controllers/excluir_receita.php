<?php 
include('../includes/essenciais.php');
$id = $_GET['id'];
$excluir_receitas = "UPDATE tb_receitas SET excluido = 'S' WHERE id = '$id'";

if (mysqli_query($conn, $excluir_receitas)) {
    alertMessage('Despesa excluida com sucesso!', 'success');
    header("Location:". SITE ."receitas");
    exit;
}else{
    alertMessage('Erro ao excluir despesa!', 'danger');
    header("Location:". SITE ."receitas");
    exit;
}
?>