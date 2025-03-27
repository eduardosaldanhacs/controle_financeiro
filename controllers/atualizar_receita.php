<?php
include('../includes/essenciais.php');
$id = $_POST['id'];
$receita = $_POST['receita'];
$valor = $_POST['valor'];
$data = $_POST['data'];


$atualizar_receitas = "UPDATE tb_receitas SET receita = '$receita', valor = '$valor', data_cadastro = '$data' WHERE id = '$id'"; 

if (mysqli_query($conn, $atualizar_receitas)) {
    alertMessage('Receita atualizada com sucesso!', 'success');
    header("Location:". SITE ."receitas");
    exit;
}else{
    alertMessage('Erro ao atualizar receita!', 'danger');
    header("Location:". SITE ."receitas");
    exit;
}