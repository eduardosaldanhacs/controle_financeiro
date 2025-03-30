<?php 
include('../includes/essenciais.php');
$receita = $_POST['receita'];
$valor = $_POST['valor'];
$data_receita = $_POST['data'];
$pago = $_POST['pago'];
$id = $_SESSION['id'];


$cadastrar = "INSERT INTO tb_receitas (receita, valor, data_cadastro, pago, id_usuario) VALUES ('$receita', '$valor','$data_receita', '$pago', '$id')";

$usuario = descobreUsuario($id);
$saldo_atual =  converterFormatoEntrada($valor) + $usuario['saldo'];

$atualiza_saldo = "UPDATE tb_usuarios SET saldo = '$saldo_atual' WHERE id = '$id'";

if (mysqli_query($conn, $cadastrar) && mysqli_query($conn, $atualiza_saldo)) {
  alertMessage('Receita cadastrada com sucesso!', 'success');
  header("Location:". SITE ."receitas");
  exit;
 }else{
    alertMessage('Erro ao cadastrar receita!', 'danger');
    header("Location:". SITE ."receitas");
    exit;
}
?>





