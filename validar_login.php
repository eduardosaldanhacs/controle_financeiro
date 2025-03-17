<?php 
session_start(); 

include('includes/connect.php');
include('define.php');

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

if(empty($cpf)){
    $_SESSION['error']['message'] = "Preencha o campo CPF";
    $_SESSION['error']['type'] = "danger";
    header("Location: ". SITE);
    exit;

} else if(empty($senha)){
    $_SESSION['error']['message'] = "Preencha o campo CPF";
    $_SESSION['error']['type'] = "danger";
    header("Location: ". SITE);
    exit;
}


$stmt = $conn->prepare("SELECT * FROM tb_usuarios WHERE cpf = '$cpf'");
$stmt->bind_param("s", $cpf);
$stmt->execute();
$stmt->store_result();

// Verifica se o usuário existe
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $nome, $senha_hash);
    $stmt->fetch();

    // Verifica a senha
    if (password_verify($senha, $senha_hash)) {
        $_SESSION['id'] = $id;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['nome'] = $dados['nome']; 
        header("Location:" . SITE . " home"); // Redireciona para a área logada
        exit();
    } else {
        $_SESSION['error']['message'] = "Senha inválida";
        $_SESSION['error']['type'] = "danger";
        header("Location: ". SITE);
        exit;
    }
} else {
    $_SESSION['error']['message'] = "Usuário ou senha inválidos";
    $_SESSION['error']['type'] = "danger";
    header("Location: ". SITE);
    exit;
}

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
