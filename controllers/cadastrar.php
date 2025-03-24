<?php
include('../includes/essenciais.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // Validação básica
    if (empty($nome) || empty($cpf) || empty($senha) || empty($confirma_senha)) {
        echo "<script>alert('Preencha todos os campos!'); window.location.href='cadastrar.php';</script>";
        exit;
    }

    // Verifica se as senhas coincidem
    if ($senha !== $confirma_senha) {
        echo "<script>alert('As senhas não coincidem!'); window.location.href='cadastrar.php';</script>";
        exit;
    }

    // Verifica se o CPF já está cadastrado
    $stmt = $conn->prepare("SELECT cpf FROM tb_usuarios WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('CPF já cadastrado!'); window.location.href='cadastrar.php';</script>";
        exit;
    }

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere o usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO tb_usuarios (nome, cpf, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $cpf, $senha_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar. Tente novamente.'); window.location.href='cadastrar.php';</script>";
    }

    $stmt->close();
}
?>
