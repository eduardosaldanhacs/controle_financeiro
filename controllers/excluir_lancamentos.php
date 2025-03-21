<?php 
include('../includes/connect.php');
include('../define.php');
$id = $_GET['id'];
$excluir_lancamentos = "UPDATE tb_lancamentos SET excluido = 'S' WHERE id = '$id'";

if (mysqli_query($conn, $excluir_lancamentos)) {
    header("Location:".SITE ."lancamentos");
    exit;
}else{
    echo 'ERRO AO EXCLUIR!';
}
?>