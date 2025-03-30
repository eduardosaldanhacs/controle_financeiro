<?php 

include('../includes/essenciais.php');
$despesa = $_POST['despesa'];
$valor = $_POST['valor'];
$data_despesa = $_POST['data'];
$pago = $_POST['pago'];
$id_usuario = $_SESSION['id'];


$cadastrar = "INSERT INTO tb_despesas (despesa, valor, data_cadastro, pago, id_usuario) VALUES ('$despesa', '$valor','$data_despesa', '$pago', '$id_usuario')";


if($pago == 'S') {
$usuario = descobreUsuario($id_usuario);
$saldo_atual = $usuario['saldo'] - converterFormatoEntrada($valor);
$atualiza_saldo = "UPDATE tb_usuarios SET saldo = '$saldo_atual' WHERE id = '$id_usuario'";
mysqli_query($conn, $atualiza_saldo);
}

 
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





