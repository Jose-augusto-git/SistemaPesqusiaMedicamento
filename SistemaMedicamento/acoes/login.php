<?php
session_start();
require_once("conexao.php");

if (isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $query->execute([$email, $senha]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
        header("Location: ../cadastro.php");
        exit;
    } else {
        header("Location: ../index.php?login=erro_dados");
        exit;
    }
} else {
    header("Location: ../index.php?login=erro_conexao");
    exit;
}
?>
