<?php
include('../includes/essenciais.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Validação básica
    if (empty($nome) || empty($cpf) || empty($senha) || empty($confirma_senha)) {
        alertMessage('Preencha todos os campos!', 'danger');
        header("Location:". SITE ."despesas");  
        exit;
    }

    // Verifica se as senhas coincidem
    if ($senha !== $confirma_senha) {
        alertMessage('As senhas não coincidem!', 'danger');
        header("Location:". SITE ."despesas");
        exit;
    }

    // Verifica se o CPF já está cadastrado
    $stmt = $conn->prepare("SELECT cpf FROM tb_usuarios WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        alertMessage('CPF já cadastrado!', 'danger');
        header("Location:". SITE ."despesas");
        exit;
    }

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere o usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO tb_usuarios (nome, cpf, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $cpf, $senha_hash);

    if ($stmt->execute()) {
        alertMessage('Cadastro realizado com sucesso!', 'success');
        header("Location:". SITE ."despesas");
        exit;
    } else {
        alertMessage('Erro ao cadastrar. Tente novamente.', 'danger');
        header("Location:". SITE ."despesas");
        exit;
    }

    $stmt->close();
}
?>
