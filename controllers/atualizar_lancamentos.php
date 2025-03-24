<?php
include('../includes/essenciais.php');
$id = $_POST['id'];
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$pago = $_POST['pago'];

echo $atualizar_lancamentos = "UPDATE tb_lancamentos SET despesa = '$despesa', valor = '$valor', data_lancamentos = '$data', pago = '$pago'  WHERE id = '$id'"; 

if (mysqli_query($conn, $atualizar_lancamentos)) {
    alertMessage('Despesa atualizada com sucesso!', 'success');
    header("Location:". SITE ."lancamentos");
    exit;
}else{
    alertMessage('Erro ao atualizar despesa!', 'danger');
    header("Location:". SITE ."lancamentos");
    exit;
}