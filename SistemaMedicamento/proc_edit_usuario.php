<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$medicamentos = filter_input(INPUT_POST, 'medicamentos', FILTER_SANITIZE_STRING);
$abreviacao = filter_input(INPUT_POST, 'abreviacao', FILTER_SANITIZE_STRING);
$latim = filter_input(INPUT_POST, 'latim', FILTER_SANITIZE_STRING);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_SANITIZE_STRING);
$principal = filter_input(INPUT_POST, 'principal', FILTER_SANITIZE_STRING);



//echo "medicamentos: $medicamentos <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE sistema SET medicamentos='$medicamentos', abreviacao='$abreviacao',latim='$latim',fonte='$fonte',principal='$principal'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:#addb31;font-size:3.0rem;max-width: 1000px;'>
    
    <img src='imagem/verifica.svg' alt='voltar' style='width: 4rem;'>Medicamento editado com sucesso</p>";
	header("Location: pesquisar-medicamento.php");
}else{
	$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Medicamento não foi editado
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'></p>";
	header("Location: editar.php?id=$id");
}
