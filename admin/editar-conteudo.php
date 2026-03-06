<?php
require_once '../config/config.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';
verificarLogin();

$mensagem = '';
$tipo_msg = '';

// Salvar conteúdo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['chave'])) {
    $chave  = $_POST['chave'];
    $titulo = $_POST['titulo'] ?? '';
    $texto  = $_POST['texto'] ?? '';
    salvarConteudo($chave, $titulo, $texto);
    $mensagem = '✅ Conteúdo atualizado com sucesso!';
    $tipo_msg = 'sucesso';
}

$conteudos = getTodosConteudos();
// Agrupa os conteúdos por página
$grupos = [
    'home'     => ['label' => '🏠 Página Inicial', 'itens' => []],
    'sobre'    => ['label' => '💛 Sobre', 'itens' => []],
    'servico'  => ['label' => '🎨 Serviços', 'itens' => []],
    'contato'  => ['label' => '📞 Contato', 'itens' => []],
];

foreach ($conteudos as $c) {
    foreach ($grupos as $prefixo => &$grupo) {
        if (str_starts_with($c['chave'], $prefixo)) {
            $grupo['itens'][] = $c;
            break;
        }
    }
}
unset($grupo);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conteúdo | <?= SITE_NOME ?></title>
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
            <a href="editar-conteudo.php" class="ativo">✏️ Editar Conteúdo</a>
            <a href="usuarios.php">👥 Usuários</a>
            <a href="<?= SITE_URL ?>/index.php" target="_blank">🌐 Ver Site</a>
            <a href="logout.php" class="nav-logout">🚪 Sair</a>
        </nav>
    </aside>

    <div class="admin-conteudo">
        <div class="admin-header">
            <h1>Editar Conteúdo ✏️</h1>
            <span class="admin-usuario">👋 <strong><?= htmlspecialchars($_SESSION['usuario_nome']) ?></strong></span>
        </div>

        <?php if ($mensagem): ?>
            <div class="alerta alerta-<?= $tipo_msg ?>"><?= $mensagem ?></div>
        <?php endif; ?>

        <?php foreach ($grupos as $grupo): ?>
            <?php if (empty($grupo['itens'])) continue; ?>
            <div class="conteudo-grupo">
                <h2><?= $grupo['label'] ?></h2>
                <?php foreach ($grupo['itens'] as $c): ?>
                    <form method="POST" class="conteudo-form">
                        <input type="hidden" name="chave" value="<?= htmlspecialchars($c['chave']) ?>">
                        <div class="form-linha">
                            <div class="campo-grupo campo-meio">
                                <label>🔑 Identificador</label>
                                <input type="text" value="<?= htmlspecialchars($c['chave']) ?>" disabled>
                            </div>
                            <div class="campo-grupo campo-meio">
                                <label>📌 Título / Rótulo</label>
                                <input type="text" name="titulo" value="<?= htmlspecialchars($c['titulo'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="campo-grupo">
                            <label>📝 Texto do Conteúdo</label>
                            <textarea name="texto" rows="3"><?= htmlspecialchars($c['texto'] ?? '') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primario btn-pequeno">Salvar 💾</button>
                    </form>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
