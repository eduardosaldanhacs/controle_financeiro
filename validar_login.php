<?php 
session_start(); 

include('includes/connect.php');
include('define.php');

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


$verificar = "SELECT * FROM tb_usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $verificar);
$dados = mysqli_fetch_array($resultado);
$id = isset($dados['id']) ? $dados['id'] : null;

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['id'] = $id;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['nome'] = $dados['nome']; 

    header("Location: ". SITE ."home");
    exit;
} else {
    header("Location: ". SITE);

}
?>
