<?php 
include('../includes/essenciais.php');
$id = $_GET['id'];
$excluir_lancamentos = "UPDATE tb_tipos_receitas SET excluido = 'S' WHERE id = '$id'";

if (mysqli_query($conn, $excluir_lancamentos)) {
    alertMessage('Receita excluida com sucesso!', 'success');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
}else{
    alertMessage('Erro ao excluir despesa!', 'danger');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
}
?>