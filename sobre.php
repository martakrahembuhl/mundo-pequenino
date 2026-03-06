<?php
require_once 'config/config.php';
require_once 'includes/functions.php';
$titulo_pagina = 'Sobre';
include 'includes/header.php';
?>

<section class="pagina-hero pagina-hero-amarelo">
    <div class="container">
        <h1><?= getConteudo('sobre_titulo') ?></h1>
        <p>Descubra nossa história e proposta pedagógica 💛</p>
    </div>
</section>

<section class="sobre-intro">
    <div class="container sobre-grid">
        <div class="sobre-texto">
            <h2>Nossa História 📖</h2>
            <p><?= getConteudo('sobre_texto') ?></p>
        </div>
        <div class="sobre-visual">
            <div class="emoji-stack">
                <span>🏫</span><span>💛</span><span>🎨</span>
                <span>📚</span><span>🌈</span><span>🤝</span>
            </div>
        </div>
    </div>
</section>

<section class="missao-visao">
    <div class="container mv-grid">
        <div class="mv-card mv-missao">
            <span class="mv-icone">🎯</span>
            <h3>Nossa Missão</h3>
            <p><?= getConteudo('sobre_missao') ?></p>
        </div>
        <div class="mv-card mv-visao">
            <span class="mv-icone">🔭</span>
            <h3>Nossa Visão</h3>
            <p><?= getConteudo('sobre_visao') ?></p>
        </div>
    </div>
</section>

<section class="valores">
    <div class="container">
        <h2 class="titulo-secao">Nossos Valores 💎</h2>
        <div class="valores-lista">
            <div class="valor-item"><span>🎨</span><p>Criatividade</p></div>
            <div class="valor-item"><span>🤝</span><p>Respeito</p></div>
            <div class="valor-item"><span>🌱</span><p>Crescimento</p></div>
            <div class="valor-item"><span>💛</span><p>Afeto</p></div>
            <div class="valor-item"><span>📚</span><p>Aprendizado</p></div>
            <div class="valor-item"><span>🌈</span><p>Inclusão</p></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
