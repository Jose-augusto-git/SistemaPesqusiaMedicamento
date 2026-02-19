<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$stmt = $conn->prepare("DELETE FROM sistema WHERE id=?");
	$resultado = $stmt->execute([$id]);
	if ($stmt->rowCount()) {
		$_SESSION['msg'] = "<p style='color:red;font-size:3.0rem;max-width: 1000px;'>
        
        <img src='imagem/verificado.png' alt='voltar' style='width: 4rem;'>
        Medicamentos apagados
        </p>";
        header("Location: lista.php");
	} else {
		
		$_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
        <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
        Medicamentos não foi apagado com sucesso
        <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
        </p>";
        header("Location: lista.php");
	}

}else{	
    $_SESSION['msg'] = "<p style='color:red; font-size:3.0rem;max-width: 1000px;'>
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'>
    Selecione um medicamento para apagar 
    <img src='imagem/pare.svg' alt='voltar' style='width: 4rem;'></p>";
    header("Location: lista.php");
}