<?php
include('../includes/connect.php');
include('../define.php');
$id = $_POST['id'];
$despesa = $_POST['despesa'];

echo $atualizar_despesas = "UPDATE tb_despesas SET despesa = '$despesa'  WHERE id = '$id'"; 

// if (mysqli_query($conn, $atualizar_despesas)) {
//     header("Location:". SITE ."listagens");
//     exit;
// }else{
//     echo 'ERRO NO CADASTRO!!!';
// }