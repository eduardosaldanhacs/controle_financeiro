<?php
include('../includes/essenciais.php');
$id = $_POST['id'];
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data = $_POST['data'];


$atualizar_despesas = "UPDATE tb_despesas SET despesa = '$despesa', valor = '$valor', data_cadastro = '$data' WHERE id = '$id'"; 

if (mysqli_query($conn, $atualizar_despesas)) {
    alertMessage('Despesa atualizada com sucesso!', 'success');
    header("Location:". SITE ."despesas");
    exit;
}else{
    alertMessage('Erro ao atualizar despesa!', 'danger');
    header("Location:". SITE ."despesas");
    exit;
}