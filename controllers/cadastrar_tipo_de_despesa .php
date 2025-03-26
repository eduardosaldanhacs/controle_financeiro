<?php 
include('../includes/essenciais.php');
$despesa = $_POST['despesa'];
$data_cadastro = date('Y-m-d:H:i:s');

$cadastrar = "INSERT INTO tb_tipos_despesa (despesa, data_cadastro) VALUES ('$despesa', '$data_cadastro')";
if (mysqli_query($conn, $cadastrar)) {
    alertMessage('Despesa cadastrada com sucesso!', 'success');
    header("Location:". SITE ."despesa");
    exit;
}else{
    alertMessage('Erro ao cadastrar despesa!', 'danger');
    header("Location:". SITE ."despesa");
    exit;
}
?>