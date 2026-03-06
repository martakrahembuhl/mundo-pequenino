// =============================================
// Mundo Pequenino — Scripts JS
// =============================================

// Menu mobile toggle
function toggleMenu() {
    const nav = document.querySelector('.nav-menu');
    if (nav) nav.classList.toggle('aberto');
}

// Fechar menu ao clicar em link
document.querySelectorAll('.nav-menu a').forEach(link => {
    link.addEventListener('click', () => {
        const nav = document.querySelector('.nav-menu');
        if (nav) nav.classList.remove('aberto');
    });
});

// Animação de entrada dos elementos ao rolar a página
function animarAoRolar() {
    const elementos = document.querySelectorAll('.card, .servico-card, .atividade-item, .valor-item, .info-item, .admin-card, .acao-card');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    elementos.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(el);
    });
}

// Confirmação antes de deletar
document.querySelectorAll('[data-confirmar]').forEach(btn => {
    btn.addEventListener('click', e => {
        const msg = btn.dataset.confirmar || 'Tem certeza?';
        if (!confirm(msg)) e.preventDefault();
    });
});

// Auto-ocultar alertas após 4 segundos
setTimeout(() => {
    document.querySelectorAll('.alerta').forEach(el => {
        el.style.transition = 'opacity 0.5s';
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 500);
    });
}, 4000);

// Inicializar ao carregar
document.addEventListener('DOMContentLoaded', () => {
    animarAoRolar();
});
