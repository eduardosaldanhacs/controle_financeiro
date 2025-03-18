<?php 
// print_r($_POST);
include('../includes/connect.php');
include('../define.php');
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data_despesa = $_POST['data'];
$pago = $_POST['pago'];
// $databr = converterDataParaInputDate($data);
//exit();

$cadastrar = "INSERT INTO tb_lancamentos (despesa, valor, data_lancamentos, pago) VALUES ('$despesa', '$valor','$data_despesa', '$pago')";

 
if (mysqli_query($conn, $cadastrar)) {
  header("Location:". SITE ."lancamentos");
 }else{
    echo 'Erro ao cadastrar despesa!';
}
?>





