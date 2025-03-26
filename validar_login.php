<?php
include('includes/essenciais.php');

$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';
print_r($_POST);
if (empty($cpf)) {
    alertMessage('Preencha o campo CPF', 'danger');
    header("Location: " . SITE);
    exit;
}

if (empty($senha)) {
    alertMessage('Preencha o campo Senha', 'danger');
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

        alertMessage('Login efetuado com sucesso', 'success');
        header("Location: " . SITE . "home");
        exit;
    } else {
        alertMessage('Senha inválida', 'danger');
        header("Location: " . SITE);
        exit;
    }
} else {
    alertMessage('Usuário ou senha inválidos', 'danger');
    header("Location: " . SITE);
    exit;
}
