<?php 
// print_r($_POST);
include('../includes/essenciais.php');
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data_despesa = $_POST['data'];
$pago = $_POST['pago'];
$id_usuario = $_SESSION['id'];
// $databr = converterDataParaInputDate($data);
//exit();

$cadastrar = "INSERT INTO tb_despesas (despesa, valor, data_cadastro, pago, id_usuario) VALUES ('$despesa', '$valor','$data_despesa', '$pago', '$id_usuario')";



$usuario = descobreUsuario($id_usuario);
echo $valor . '</br>'; 
echo $usuario['saldo'] . '</br>';
$saldo_atual = $usuario['saldo'] - converterFormatoEntrada($valor);
echo $saldo_atual;

// $saldo_atual_formatado = converterFormatoEntrada($saldo_atual);
// echo $saldo_atual . '</br>';

// $valor = converterFormatoEntrada($valor);
// echo $valor . '</br>';
// $saldo_atualizado = $saldo_atual + $valor;
// $saldo_atualizado_formatado = formatarValorReais3($saldo_atualizado);


echo $atualiza_saldo = "UPDATE tb_usuarios SET saldo = '$saldo_atual' WHERE id = '$id_usuario'";






 
if (mysqli_query($conn, $cadastrar) && mysqli_query($conn, $atualiza_saldo)) {
  alertMessage('Despesa cadastrada com sucesso!', 'success');
  header("Location:". SITE ."despesas");
  exit;
 }else{
    alertMessage('Erro ao cadastrar despesa!', 'danger');
    header("Location:". SITE ."despesas");
    exit;
}
?>





