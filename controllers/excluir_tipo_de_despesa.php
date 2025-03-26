<?php 
include('../includes/essenciais.php');
$id = $_GET['id'];
$excluir_tipo_despesas = "UPDATE tb_tipos_despesas SET excluido = 'S' WHERE id = '$id'";

if (mysqli_query($conn, $excluir_tipo_despesas)) {
    alertMessage('Receita excluida com sucesso!', 'success');
    header("Location:". SITE ."listar_tipos_de_despesas");
    exit;
}else{
    alertMessage('Erro ao excluir despesa!', 'danger');
    header("Location:". SITE ."listar_tipos_de_despesas");
    exit;
}
?>