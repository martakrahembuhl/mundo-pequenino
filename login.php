<?php
require_once 'config/config.php';
require_once 'includes/auth.php';

// Se já está logado, vai para o admin
if (isset($_SESSION['usuario_id'])) {
    header('Location: ' . SITE_URL . '/admin/index.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha'] ?? '');

    if (empty($usuario) || empty($senha)) {
        $erro = 'Preencha todos os campos!';
    } elseif (fazerLogin($usuario, $senha)) {
        header('Location: ' . SITE_URL . '/admin/index.php');
        exit;
    } else {
        $erro = 'Usuário ou senha incorretos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= SITE_NOME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_URL ?>/public/css/style.css">
</head>
<body class="pagina-login">

<div class="login-wrapper">
    <div class="login-decoracao">
        <span>🌈</span><span>⭐</span><span>🎈</span><span>🌸</span>
        <span>🦋</span><span>🎨</span><span>💛</span><span>🏫</span>
    </div>

    <div class="login-caixa">
        <div class="login-topo">
            <span class="logo-icon grande">🌍</span>
            <h1>Mundo Pequenino</h1>
            <p>Acesse o painel administrativo</p>
        </div>

        <?php if ($erro): ?>
            <div class="alerta alerta-erro">❌ <?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" class="login-form">
            <div class="campo-grupo">
                <label>👤 Usuário</label>
                <input type="text" name="usuario" placeholder="Digite seu usuário" required autofocus
                       value="<?= htmlspecialchars($_POST['usuario'] ?? '') ?>">
            </div>
            <div class="campo-grupo">
                <label>🔒 Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primario btn-full">Entrar 🔑</button>
        </form>

        <div class="login-rodape">
            <a href="<?= SITE_URL ?>/index.php">← Voltar ao site</a>
        </div>
    </div>
</div>

<script src="<?= SITE_URL ?>/public/js/script.js"></script>
</body>
</html>
