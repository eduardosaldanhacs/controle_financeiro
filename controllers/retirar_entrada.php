<?php
include('../includes/essenciais.php');

$saldo = 0;

$entradaInicial = $_POST['entrada'];
$buscaSaldo = "SELECT saldo FROM tb_usuarios";
$resultado = mysqli_query($conn, $buscaSaldo);
$dados = mysqli_fetch_array($resultado);


$entradaInicial = converterFormatoEntrada($entradaInicial);
$saldo = $dados['saldo'] - $entradaInicial;

$inserirSaldo = "UPDATE tb_usuarios SET saldo = '$saldo'";
if (mysqli_query($conn, $inserirSaldo)) {
    alertMessage('Entrada retirada com sucesso!', 'success');
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    alertMessage('Erro ao retirar entrada!', 'danger');
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
