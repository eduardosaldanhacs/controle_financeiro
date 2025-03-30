<?php 
include('../includes/essenciais.php');
$id = $_GET['id'];
$id_usuario = $_SESSION['id'];

$buscar_receita = "SELECT * FROM tb_receitas WHERE id = '$id'";
$resultado = mysqli_query($conn, $buscar_receita);
$receita = mysqli_fetch_array($resultado);
$valor = $receita['valor'];

$usuario = descobreUsuario($id_usuario);
$saldo = $usuario['saldo'];
converterFormatoEntrada($valor) . '</br>';

$saldo = $saldo - converterFormatoEntrada($valor);

$saldo_convertido = formatarValor($saldo);
$excluir_receitas = "UPDATE tb_receitas SET excluido = 'S' WHERE id = '$id'";
$atualizar_saldo = "UPDATE tb_usuarios SET saldo = $saldo_convertido";


if (mysqli_query($conn, $excluir_receitas) && atualizaSaldo($saldo_convertido, $id_usuario)) {
    alertMessage('Receita excluida com sucesso!', 'success');
    header("Location:". SITE ."receitas");
    exit;
}else{
    alertMessage('Erro ao excluir despesa!', 'danger');
    header("Location:". SITE ."receitas");
    exit;
}
?>