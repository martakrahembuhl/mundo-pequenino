<?php
require_once '../config/config.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';
verificarLogin();

$total_usuarios  = count(getTodosUsuarios());
$total_conteudos = count(getTodosConteudos());
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin | <?= SITE_NOME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_URL ?>/public/css/style.css">
</head>
<body class="pagina-admin">

<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-logo">
            <span>🌍</span>
            <span>Mundo Pequenino</span>
        </div>
        <nav class="sidebar-nav">
            <a href="index.php" class="ativo">🏠 Dashboard</a>
            <a href="editar-conteudo.php">✏️ Editar Conteúdo</a>
            <a href="usuarios.php">👥 Usuários</a>
            <a href="<?= SITE_URL ?>/index.php" target="_blank">🌐 Ver Site</a>
            <a href="logout.php" class="nav-logout">🚪 Sair</a>
        </nav>
    </aside>

    <!-- Conteúdo -->
    <div class="admin-conteudo">
        <div class="admin-header">
            <h1>Dashboard 🏠</h1>
            <span class="admin-usuario">👋 Olá, <strong><?= htmlspecialchars($_SESSION['usuario_nome']) ?></strong></span>
        </div>

        <div class="admin-cards">
            <div class="admin-card card-amarelo">
                <span class="ac-icone">👥</span>
                <div>
                    <h3><?= $total_usuarios ?></h3>
                    <p>Usuários Cadastrados</p>
                </div>
            </div>
            <div class="admin-card card-verde">
                <span class="ac-icone">📝</span>
                <div>
                    <h3><?= $total_conteudos ?></h3>
                    <p>Conteúdos no Site</p>
                </div>
            </div>
            <div class="admin-card card-rosa">
                <span class="ac-icone">🌐</span>
                <div>
                    <h3>4</h3>
                    <p>Páginas do Site</p>
                </div>
            </div>
        </div>

        <div class="admin-acoes">
            <h2>Ações Rápidas ⚡</h2>
            <div class="acoes-grid">
                <a href="editar-conteudo.php" class="acao-card">
                    <span>✏️</span>
                    <p>Editar Conteúdo</p>
                </a>
                <a href="usuarios.php" class="acao-card">
                    <span>👤</span>
                    <p>Gerenciar Usuários</p>
                </a>
                <a href="<?= SITE_URL ?>/index.php" target="_blank" class="acao-card">
                    <span>🌐</span>
                    <p>Visualizar Site</p>
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
