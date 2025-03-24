<?php 
include('../includes/essenciais.php');
$entradaInicial = $_POST['entrada'];
$totalEntrada = $_POST['entrada'];


$resultado = obterPrimeiroEUltimoDiaMesAtual();

$primeiroDia = $resultado['primeiro_dia'];
$ultimoDia = $resultado['ultimo_dia'];


$buscar_despesas = "SELECT * FROM tb_lancamentos WHERE data_lancamentos BETWEEN '$primeiroDia' AND '$ultimoDia'";
$resultado = mysqli_query($conn, $buscar_despesas);
while ($despesa = mysqli_fetch_array($resultado)) {
    $despesaAtual = number_format((float)$despesa['valor'], 2, '.', ',');
    $totalEntrada -= $despesaAtual;
}
$inserirEntrada = "UPDATE tb_usuarios SET entrada = '$entradaInicial'";
(mysqli_query($conn, $inserirEntrada));
$inserirSaldo = "UPDATE tb_usuarios SET saldo = '$totalEntrada'";
if (mysqli_query($conn, $inserirSaldo)) {
    header("Location:". SITE ."listagens");
}else{
    echo 'Erro ao atualizar saldo!';
}




?>