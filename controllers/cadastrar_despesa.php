<?php 
include('../includes/connect.php');
include('../define.php');
$despesa = $_POST['despesa'];

$cadastrar = "INSERT INTO tb_despesas (despesas) VALUES ('$despesa')";
if (mysqli_query($conexao, $cadastrar)) {
    header("Location:". SITE ."painel/despesas.php");
}else{
    echo 'Erro ao cadastrar despesa!';
}
?>