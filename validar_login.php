<?php 
session_start(); 

include('includes/connect.php');
include('define.php');

$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($cpf)) {
    $_SESSION['error']['message'] = "Preencha o campo CPF";
    $_SESSION['error']['type'] = "danger";
    header("Location: " . SITE);
    exit;
} 

if (empty($senha)) {
    $_SESSION['error']['message'] = "Preencha o campo Senha";
    $_SESSION['error']['type'] = "danger";
    header("Location: " . SITE);
    exit;
}

$stmt = $conn->prepare("SELECT id, nome, senha FROM tb_usuarios WHERE cpf = ?");
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();
    
    if (password_verify($senha, $dados['senha'])) {
        $_SESSION['id'] = $dados['id'];
        $_SESSION['cpf'] = $cpf;
        $_SESSION['nome'] = $dados['nome']; 
        
        header("Location: " . SITE . "home");
        exit;
    } else {
        $_SESSION['error']['message'] = "Senha inv�lida";
    }
} else {
    $_SESSION['error']['message'] = "Usu�rio ou senha inv�lidos";
}

$_SESSION['error']['type'] = "danger";
header("Location: " . SITE );
exit;
?>
