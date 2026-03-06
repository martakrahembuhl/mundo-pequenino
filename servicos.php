<?php
require_once 'config/config.php';
require_once 'includes/functions.php';
$titulo_pagina = 'Serviços';
include 'includes/header.php';
?>

<section class="pagina-hero pagina-hero-verde">
    <div class="container">
        <h1>Nossos Serviços 🎨</h1>
        <p>Conheça as turmas e atividades que oferecemos</p>
    </div>
</section>

<section class="servicos-lista">
    <div class="container">
        <h2 class="titulo-secao">Turmas e Atividades 🌟</h2>
        <div class="servicos-grid">

            <div class="servico-card">
                <div class="servico-topo servico-amarelo">
                    <span>👶</span>
                </div>
                <div class="servico-corpo">
                    <h3><?= getConteudo('servico1_titulo', 'titulo') ?></h3>
                    <p><?= getConteudo('servico1_texto') ?></p>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-topo servico-rosa">
                    <span>🧒</span>
                </div>
                <div class="servico-corpo">
                    <h3><?= getConteudo('servico2_titulo', 'titulo') ?></h3>
                    <p><?= getConteudo('servico2_texto') ?></p>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-topo servico-verde">
                    <span>👧</span>
                </div>
                <div class="servico-corpo">
                    <h3><?= getConteudo('servico3_titulo', 'titulo') ?></h3>
                    <p><?= getConteudo('servico3_texto') ?></p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="atividades-extra">
    <div class="container">
        <h2 class="titulo-secao">Atividades Extras 🎉</h2>
        <div class="atividades-grid">
            <div class="atividade-item"><span>🎵</span><p>Musicalização</p></div>
            <div class="atividade-item"><span>🖌️</span><p>Artes Plásticas</p></div>
            <div class="atividade-item"><span>🏃</span><p>Educação Física</p></div>
            <div class="atividade-item"><span>📖</span><p>Contação de Histórias</p></div>
            <div class="atividade-item"><span>🌿</span><p>Horta Escolar</p></div>
            <div class="atividade-item"><span>🎭</span><p>Teatro</p></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
