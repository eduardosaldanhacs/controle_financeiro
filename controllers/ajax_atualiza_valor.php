<?php
include('../includes/connect.php');
include('../define.php');
// Valida as entradas
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING); // Recebe o valor como string primeiro

// Remove o ponto dos milhares e substitui a vírgula por ponto
$valor = str_replace('.', '', $valor); 
$valor = str_replace(',', '.', $valor); 

// Agora converte o valor para float
$valor = filter_var($valor, FILTER_VALIDATE_FLOAT);


if ($id === null || $valor === null) {
    echo json_encode(['success' => false, 'error' => 'Dados inválidos.']);
    exit;
}


$stmt = $conn->prepare("UPDATE tb_lancamentos SET valor = ? WHERE id = ?");
$stmt->bind_param("di", $valor, $id); // d = double (float), i = integer

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

$stmt->close();
$conn->close();
?>
