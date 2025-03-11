<?php 
include('../includes/connect.php');
include('../define.php');
$id = $_GET['id'];
$excluir_lancamentos = "DELETE FROM tb_lancamentos WHERE id = '$id'";

if (mysqli_query($conexao, $excluir_lancamentos)) {
    header("Location:".SITE ."painel/listagens.php");
    exit;
}else{
    echo 'ERRO AO EXCLUIR!';
}
?>