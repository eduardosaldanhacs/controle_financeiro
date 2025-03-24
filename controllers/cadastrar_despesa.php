<?php 
include('../includes/essenciais.php');
$despesa = $_POST['despesa'];
$data_cadastro = date('Y-m-d:H:i:s');

echo $cadastrar = "INSERT INTO tb_despesas (despesa, data_cadastro) VALUES ('$despesa', '$data_cadastro')";
if (mysqli_query($conn, $cadastrar)) {
    alertMessage('Despesa cadastrada com sucesso!', 'success');
    header("Location:". SITE ."despesas");
}else{
    alertMessage('Erro ao cadastrar despesa!', 'danger');
    header("Location:". SITE ."despesas");
}
?>