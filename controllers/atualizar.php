<?php
include('../includes/connect.php');
include('../define.php');
$id = $_GET['id'];
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$pago = $_POST['pago'];

$atualizar_lancamentos = "UPDATE tb_lancamentos SET despesa = '$despesa', valor = '$valor', data_lancamentos = '$data', pago = '$pago' WHERE id = '$id'"; 

if (mysqli_query($conexao, $atualizar_lancamentos)) {
    header("Location:". SITE ."painel/listagens.php");
    exit;
}else{
    echo 'ERRO NO CADASTRO!!!';
}
?>