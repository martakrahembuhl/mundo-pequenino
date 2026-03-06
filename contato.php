<?php
require_once 'config/config.php';
require_once 'includes/functions.php';
$titulo_pagina = 'Contato';
include 'includes/header.php';
?>

<section class="pagina-hero pagina-hero-rosa">
    <div class="container">
        <h1>Entre em Contato 📞</h1>
        <p>Estamos aqui para tirar todas as suas dúvidas!</p>
    </div>
</section>

<section class="contato-secao">
    <div class="container contato-grid">

        <div class="contato-info">
            <h2>Informações 📍</h2>

            <div class="info-item">
                <span class="info-icone">📍</span>
                <div>
                    <strong>Endereço</strong>
                    <p><?= getConteudo('contato_endereco') ?></p>
                </div>
            </div>

            <div class="info-item">
                <span class="info-icone">📞</span>
                <div>
                    <strong>Telefone / WhatsApp</strong>
                    <p><?= getConteudo('contato_telefone') ?></p>
                </div>
            </div>

            <div class="info-item">
                <span class="info-icone">✉️</span>
                <div>
                    <strong>E-mail</strong>
                    <p><?= getConteudo('contato_email') ?></p>
                </div>
            </div>

            <div class="info-item">
                <span class="info-icone">⏰</span>
                <div>
                    <strong>Horário de Funcionamento</strong>
                    <p><?= getConteudo('contato_horario') ?></p>
                </div>
            </div>
        </div>

        <div class="contato-form-area">
            <h2>Envie uma Mensagem ✉️</h2>
            <?php if (isset($_GET['enviado'])): ?>
                <div class="alerta alerta-sucesso">✅ Mensagem enviada com sucesso! Entraremos em contato em breve.</div>
            <?php endif; ?>
            <form class="contato-form" action="#" method="POST">
                <div class="campo-grupo">
                    <label>Seu nome 😊</label>
                    <input type="text" name="nome" placeholder="Como podemos te chamar?" required>
                </div>
                <div class="campo-grupo">
                    <label>E-mail 📧</label>
                    <input type="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="campo-grupo">
                    <label>Mensagem 💬</label>
                    <textarea name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primario">Enviar mensagem 💛</button>
            </form>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
