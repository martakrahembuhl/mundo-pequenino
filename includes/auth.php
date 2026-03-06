<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

// Verifica se o usuário está logado
function verificarLogin() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ' . SITE_URL . '/login.php');
        exit;
    }
}

// Realiza o login do usuário
function fazerLogin($usuario, $senha) {
    $conexao = conectar();
    $usuario = $conexao->real_escape_string($usuario);

    $resultado = $conexao->query("SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1");

    if ($resultado && $resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();
        if (md5($senha) === $dados['senha']) {
            $_SESSION['usuario_id']   = $dados['id'];
            $_SESSION['usuario_nome'] = $dados['nome'];
            $_SESSION['usuario_tipo'] = $dados['tipo'];
            $conexao->close();
            return true;
        }
    }

    $conexao->close();
    return false;
}

// Realiza o logout
function fazerLogout() {
    session_destroy();
    header('Location: ' . SITE_URL . '/login.php');
    exit;
}

// Retorna se o usuário logado é admin
function ehAdmin() {
    return isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin';
}
