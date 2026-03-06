<?php
// Configurações gerais do sistema
define('SITE_NOME', 'Mundo Pequenino');
define('SITE_URL', 'http://localhost/mundo-pequenino');
define('VERSAO', '1.0.0');

// Iniciar sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
