<?php
include('../includes/essenciais.php');
$id = $_POST['id'];
$despesa = $_POST['despesa'];

$atualizar_despesas = "UPDATE tb_tipos_despesas SET despesa = '$despesa'  WHERE id = '$id'"; 

if (mysqli_query($conn, $atualizar_despesas)) {
    alertMessage('Tipo de despesa atualizada com sucesso!', 'success');
    header("Location:". SITE ."listar_tipos_de_despesas");
    exit;
} else {
    alertMessage('Erro ao atualizar o tipo de despesa!', 'danger');
    header("Location:". SITE ."listar_tipos_de_despesas");
    exit;
}