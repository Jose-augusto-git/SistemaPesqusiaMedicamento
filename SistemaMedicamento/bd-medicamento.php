<?php
session_start();
include_once("conexao.php");

$medicamentos = filter_input(INPUT_POST, 'medicamentos', FILTER_DEFAULT);
$abreviacao = filter_input(INPUT_POST, 'abreviacao', FILTER_DEFAULT);
$latim = filter_input(INPUT_POST, 'latim', FILTER_DEFAULT);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_DEFAULT);
$principal = filter_input(INPUT_POST, 'principal', FILTER_DEFAULT);


$stmt = $conn->prepare("INSERT INTO sistema (medicamentos, abreviacao, latim, fonte, principal) VALUES (?, ?, ?, ?, ?)");
$resultado = $stmt->execute([$medicamentos, $abreviacao, $latim, $fonte, $principal]);

if ($resultado) {
    $_SESSION['msg'] = "<p style='color:#e4ff00;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>
    Medicamento cadastrado com sucesso 
    </p>";
    header("Location: cadastro.php");
} else {
    $_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
	Atenção Medicamento não foi cadastrado
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    </p>";
    header("Location: cadastro.php");
}

