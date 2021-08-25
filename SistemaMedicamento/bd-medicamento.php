<?php
session_start();
include_once("conexao.php");

$medicamentos = filter_input(INPUT_POST, 'medicamentos', FILTER_SANITIZE_STRING);
$abreviacao = filter_input(INPUT_POST, 'abreviacao', FILTER_SANITIZE_STRING);
$latim = filter_input(INPUT_POST, 'latim', FILTER_SANITIZE_STRING);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_SANITIZE_STRING);
$principal = filter_input(INPUT_POST, 'principal', FILTER_SANITIZE_STRING);


$result_usuario = "INSERT INTO sistema (medicamentos,abreviacao,latim,fonte,principal) VALUES ('$medicamentos','$abreviacao','$latim','$fonte','$principal')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:#e4ff00;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>
    Medicamento cadastrado com sucesso 
    </p>";
    header("Location: cadastro.php");
}else{
    $_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
	Atenção Medicamento não foi cadastrado
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    </p>";
    header("Location: cadastro.php");
}
