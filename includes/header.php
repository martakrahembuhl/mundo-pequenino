<?php
require_once __DIR__ . '/../config/config.php';
$pagina_atual = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo_pagina) ? $titulo_pagina . ' | ' : '' ?><?= SITE_NOME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_URL ?>/public/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a href="<?= SITE_URL ?>/index.php" class="logo">
            <span class="logo-icon">🌍</span>
            <span class="logo-texto">Mundo <strong>Pequenino</strong></span>
        </a>

        <nav class="nav-menu">
            <a href="<?= SITE_URL ?>/index.php" class="<?= $pagina_atual === 'index' ? 'ativo' : '' ?>">🏠 Home</a>
            <a href="<?= SITE_URL ?>/sobre.php" class="<?= $pagina_atual === 'sobre' ? 'ativo' : '' ?>">💛 Sobre</a>
            <a href="<?= SITE_URL ?>/servicos.php" class="<?= $pagina_atual === 'servicos' ? 'ativo' : '' ?>">🎨 Serviços</a>
            <a href="<?= SITE_URL ?>/contato.php" class="<?= $pagina_atual === 'contato' ? 'ativo' : '' ?>">📞 Contato</a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="<?= SITE_URL ?>/admin/index.php" class="btn-admin">⚙️ Painel</a>
            <?php else: ?>
                <a href="<?= SITE_URL ?>/login.php" class="btn-login">🔑 Login</a>
            <?php endif; ?>
        </nav>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    </div>
</header>

<main class="conteudo-principal">
