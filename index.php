<?php
require_once 'config/config.php';
require_once 'includes/functions.php';
$titulo_pagina = 'Home';
include 'includes/header.php';
?>

<!-- Hero -->
<section class="hero">
    <div class="hero-bolhas">
        <span class="bolha b1">🌈</span>
        <span class="bolha b2">⭐</span>
        <span class="bolha b3">🎈</span>
        <span class="bolha b4">🦋</span>
        <span class="bolha b5">🌸</span>
        <span class="bolha b6">🎀</span>
    </div>
    <div class="hero-conteudo">
        <h1><?= getConteudo('home_titulo') ?></h1>
        <p class="hero-sub"><?= getConteudo('home_subtitulo') ?></p>
        <p class="hero-desc"><?= getConteudo('home_descricao') ?></p>
        <div class="hero-botoes">
            <a href="sobre.php" class="btn btn-primario">Conheça a escola 💛</a>
            <a href="contato.php" class="btn btn-secundario">Fale conosco 📞</a>
        </div>
    </div>
    <div class="hero-imagem">
        <div class="circulo-animado">
            <span class="emoji-grande">🏫</span>
        </div>
    </div>
</section>

<!-- Destaques -->
<section class="destaques">
    <div class="container">
        <h2 class="titulo-secao">Por que escolher o <span>Mundo Pequenino</span>? 🌟</h2>
        <div class="cards-grid">
            <div class="card card-amarelo">
                <span class="card-icone">🎨</span>
                <h3>Aprendizado Lúdico</h3>
                <p>Aprender brincando é a nossa essência. Cada atividade é planejada com amor e intenção pedagógica.</p>
            </div>
            <div class="card card-verde">
                <span class="card-icone">👩‍🏫</span>
                <h3>Equipe Especializada</h3>
                <p>Professores e educadores apaixonados pela infância, com formação e dedicação ao desenvolvimento infantil.</p>
            </div>
            <div class="card card-rosa">
                <span class="card-icone">🤝</span>
                <h3>Ambiente Acolhedor</h3>
                <p>Espaço seguro, colorido e estimulante onde cada criança se sente especial e amada.</p>
            </div>
            <div class="card card-azul">
                <span class="card-icone">🌱</span>
                <h3>Desenvolvimento Integral</h3>
                <p>Cuidamos do desenvolvimento cognitivo, emocional, social e motor de cada criança.</p>
            </div>
        </div>
    </div>
</section>

<!-- Chamada para ação -->
<section class="cta">
    <div class="container cta-inner">
        <h2>Venha conhecer nossa escola! 🎉</h2>
        <p>Agende uma visita e descubra por que somos a escolha certa para o futuro do seu filho.</p>
        <a href="contato.php" class="btn btn-branco">Agendar visita 📅</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
