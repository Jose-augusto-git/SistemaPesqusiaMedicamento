<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$medicamentos = filter_input(INPUT_POST, 'medicamentos', FILTER_DEFAULT);
$abreviacao = filter_input(INPUT_POST, 'abreviacao', FILTER_DEFAULT);
$latim = filter_input(INPUT_POST, 'latim', FILTER_DEFAULT);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_DEFAULT);
$principal = filter_input(INPUT_POST, 'principal', FILTER_DEFAULT);



//echo "medicamentos: $medicamentos <br>";
//echo "E-mail: $email <br>";

$stmt = $conn->prepare("UPDATE sistema SET medicamentos=?, abreviacao=?, latim=?, fonte=?, principal=? WHERE id=?");
$resultado = $stmt->execute([$medicamentos, $abreviacao, $latim, $fonte, $principal, $id]);

if ($resultado) {
	$_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>Medicamento editado com sucesso</p>";
	header("Location: pesquisar-medicamento.php");
} else {
	$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Medicamento não foi editado
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'></p>";
	header("Location: editar.php?id=$id");
}

