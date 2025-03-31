<?php
include('../includes/essenciais.php');
$id = $_POST['id'];
$receita = $_POST['receita'];

$atualizar_receitas = "UPDATE tb_tipos_receitas SET receita = '$receita'  WHERE id = '$id'"; 

if (mysqli_query($conn, $atualizar_receitas)) {
    alertMessage('Tipo de receita atualizada com sucesso!', 'success');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
} else {
    alertMessage('Erro ao atualizar o tipo de receita!', 'danger');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
}