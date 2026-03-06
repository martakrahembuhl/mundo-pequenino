</main>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-logo">
            <span class="logo-icon">🌍</span>
            <span class="logo-texto">Mundo <strong>Pequenino</strong></span>
            <p>Um lugar mágico para crescer! ✨</p>
        </div>
        <div class="footer-links">
            <h4>Páginas</h4>
            <a href="<?= SITE_URL ?>/index.php">Home</a>
            <a href="<?= SITE_URL ?>/sobre.php">Sobre</a>
            <a href="<?= SITE_URL ?>/servicos.php">Serviços</a>
            <a href="<?= SITE_URL ?>/contato.php">Contato</a>
        </div>
        <div class="footer-contato">
            <h4>Contato</h4>
            <p>📍 <?= getConteudo('contato_endereco') ?></p>
            <p>📞 <?= getConteudo('contato_telefone') ?></p>
            <p>✉️ <?= getConteudo('contato_email') ?></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?= date('Y') ?> <?= SITE_NOME ?> — Desenvolvido por Marta Krah Embuhl 💛</p>
    </div>
</footer>

<script src="<?= SITE_URL ?>/public/js/script.js"></script>
</body>
</html>
