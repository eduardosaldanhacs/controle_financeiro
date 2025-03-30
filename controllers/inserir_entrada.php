<?php  
include('../includes/essenciais.php');
$saldo = 0;

$entradaInicial = $_POST['entrada'];
$buscaSaldo = "SELECT saldo FROM tb_usuarios";
$resultado = mysqli_query($conn, $buscaSaldo);
$dados = mysqli_fetch_array($resultado);

$entradaInicial = converterFormatoEntrada($entradaInicial);
$saldo = $entradaInicial + $dados['saldo'];

$inserirSaldo = "UPDATE tb_usuarios SET saldo = '$saldo'";
if (mysqli_query($conn, $inserirSaldo)) {
    alertMessage('Entrada cadastrada com sucesso!', 'success');
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    alertMessage('Erro ao cadastrar entrada!', 'danger');
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
