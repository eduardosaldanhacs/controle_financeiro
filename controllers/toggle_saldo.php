<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_SESSION['saldo_visivel'])) {
    $_SESSION['saldo_visivel'] = false; // Define padrão se ainda não existir
}

// Apenas alterna o estado quando a requisição for POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['saldo_visivel'] = !$_SESSION['saldo_visivel'];
}

// Retorna o estado atual
echo json_encode(['saldo_visivel' => $_SESSION['saldo_visivel']]);
