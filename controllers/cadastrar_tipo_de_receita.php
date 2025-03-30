<?php 
include('../includes/essenciais.php');
$receita = $_POST['receita'];
$data_cadastro = date('Y-m-d:H:i:s');

$cadastrar = "INSERT INTO tb_tipos_receitas (receita, data_cadastro) VALUES ('$receita', '$data_cadastro')";
if (mysqli_query($conn, $cadastrar)) {
    alertMessage('Receita cadastrada com sucesso!', 'success');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
}else{
    alertMessage('Erro ao cadastrar receita!', 'danger');
    header("Location:". SITE ."listar_tipos_de_receitas");
    exit;
}
?>