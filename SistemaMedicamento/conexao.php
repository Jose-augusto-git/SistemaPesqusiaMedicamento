<?php
try {
    $conn = new PDO('sqlite:' . __DIR__ . '/database.db');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Compatibility for files using $conexao
    $conexao = $conn;
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
