<?php 
include('../includes/connect.php');
include('../define.php');
$despesa = $_POST['despesa'];
$data_cadastro = date('Y-m-d:H:i:s');

echo $cadastrar = "INSERT INTO tb_despesas (despesa, data_cadastro) VALUES ('$despesa', '$data_cadastro')";
if (mysqli_query($conn, $cadastrar)) {
    header("Location:". SITE ."despesas");
}else{
    echo 'Erro ao cadastrar despesa!';
}
?>