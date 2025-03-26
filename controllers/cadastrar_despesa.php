<?php 
// print_r($_POST);
include('../includes/essenciais.php');
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data_despesa = $_POST['data'];
$pago = $_POST['pago'];
// $databr = converterDataParaInputDate($data);
//exit();

$cadastrar = "INSERT INTO tb_despesas (despesa, valor, data_cadastro, pago) VALUES ('$despesa', '$valor','$data_despesa', '$pago')";

 
if (mysqli_query($conn, $cadastrar)) {
  alertMessage('Despesa cadastrada com sucesso!', 'success');
  header("Location:". SITE ."despesas");
  exit;
 }else{
    alertMessage('Erro ao cadastrar despesa!', 'danger');
    header("Location:". SITE ."despesas");
    exit;
}
?>





