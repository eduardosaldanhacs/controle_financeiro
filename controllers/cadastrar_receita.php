<?php 
// print_r($_POST);
include('../includes/essenciais.php');
$receita = $_POST['receita'];
$valor = $_POST['valor'];
$data_receita = $_POST['data'];
$pago = $_POST['pago'];
// $databr = converterDataParaInputDate($data);
//exit();

echo $cadastrar = "INSERT INTO tb_receitas (receita, valor, data_cadastro, pago) VALUES ('$receita', '$valor','$data_receita', '$pago')";

 
if (mysqli_query($conn, $cadastrar)) {
  alertMessage('Receita cadastrada com sucesso!', 'success');
  header("Location:". SITE ."receitas");
  exit;
 }else{
    alertMessage('Erro ao cadastrar receita!', 'danger');
    header("Location:". SITE ."receitas");
    exit;
}
?>





