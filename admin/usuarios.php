<?php
require_once '../config/config.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';
verificarLogin();

$mensagem = '';
$tipo_msg = '';

// Cadastrar novo usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
    $resultado = cadastrarUsuario(
        trim($_POST['nome'] ?? ''),
        trim($_POST['usuario'] ?? ''),
        trim($_POST['senha'] ?? ''),
        trim($_POST['email'] ?? ''),
        $_POST['tipo'] ?? 'editor'
    );
    $mensagem = $resultado['mensagem'];
    $tipo_msg = $resultado['sucesso'] ? 'sucesso' : 'erro';
}

// Deletar usuário
if (isset($_GET['deletar'])) {
    $id = (int) $_GET['deletar'];
    if ($id !== (int) $_SESSION['usuario_id']) {
        deletarUsuario($id);
        $mensagem = '🗑️ Usuário removido.';
        $tipo_msg = 'sucesso';
    } else {
        $mensagem = '❌ Você não pode remover seu próprio usuário!';
        $tipo_msg = 'erro';
    }
}

$usuarios = getTodosUsuarios();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários | <?= SITE_NOME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_URL ?>/public/css/style.css">
</head>
<body class="pagina-admin">

<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="sidebar-logo"><span>🌍</span><span>Mundo Pequenino</span></div>
        <nav class="sidebar-nav">
            <a href="index.php">🏠 Dashboard</a>
            <a href="editar-conteudo.php">✏️ Editar Conteúdo</a>
            <a href="usuarios.php" class="ativo">👥 Usuários</a>
            <a href="<?= SITE_URL ?>/index.php" target="_blank">🌐 Ver Site</a>
            <a href="logout.php" class="nav-logout">🚪 Sair</a>
        </nav>
    </aside>

    <div class="admin-conteudo">
        <div class="admin-header">
            <h1>Gerenciar Usuários 👥</h1>
            <span class="admin-usuario">👋 <strong><?= htmlspecialchars($_SESSION['usuario_nome']) ?></strong></span>
        </div>

        <?php if ($mensagem): ?>
            <div class="alerta alerta-<?= $tipo_msg ?>"><?= $mensagem ?></div>
        <?php endif; ?>

        <!-- Lista de usuários -->
        <div class="conteudo-grupo">
            <h2>Usuários Cadastrados</h2>
            <div class="tabela-wrapper">
                <table class="tabela-admin">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                            <tr>
                                <td><?= $u['id'] ?></td>
                                <td><?= htmlspecialchars($u['nome']) ?></td>
                                <td><strong><?= htmlspecialchars($u['usuario']) ?></strong></td>
                                <td><?= htmlspecialchars($u['email'] ?? '-') ?></td>
                                <td>
                                    <span class="badge badge-<?= $u['tipo'] ?>">
                                        <?= $u['tipo'] === 'admin' ? '⭐ Admin' : '✏️ Editor' ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($u['usuario'] !== 'admin' && $u['id'] != $_SESSION['usuario_id']): ?>
                                        <a href="?deletar=<?= $u['id'] ?>" class="btn-tabela btn-vermelho"
                                           onclick="return confirm('Tem certeza que deseja remover este usuário?')">
                                           🗑️ Remover
                                        </a>
                                    <?php else: ?>
                                        <span class="badge badge-editor">protegido</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Cadastrar novo usuário -->
        <div class="conteudo-grupo">
            <h2>➕ Cadastrar Novo Usuário</h2>
            <form method="POST" class="conteudo-form">
                <input type="hidden" name="acao" value="cadastrar">
                <div class="form-linha">
                    <div class="campo-grupo campo-meio">
                        <label>👤 Nome Completo</label>
                        <input type="text" name="nome" placeholder="Ex: Maria Silva" required>
                    </div>
                    <div class="campo-grupo campo-meio">
                        <label>🔑 Nome de Usuário</label>
                        <input type="text" name="usuario" placeholder="Ex: maria.silva" required>
                    </div>
                </div>
                <div class="form-linha">
                    <div class="campo-grupo campo-meio">
                        <label>✉️ E-mail</label>
                        <input type="email" name="email" placeholder="email@exemplo.com">
                    </div>
                    <div class="campo-grupo campo-meio">
                        <label>🔒 Senha</label>
                        <input type="password" name="senha" placeholder="Mínimo 6 caracteres" required minlength="6">
                    </div>
                </div>
                <div class="campo-grupo campo-pequeno">
                    <label>⭐ Tipo de Acesso</label>
                    <select name="tipo">
                        <option value="editor">✏️ Editor</option>
                        <option value="admin">⭐ Administrador</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primario">Cadastrar Usuário ➕</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
