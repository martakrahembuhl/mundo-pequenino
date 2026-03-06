<?php
// Configurações do banco de dados
// Altere os valores abaixo conforme o seu ambiente
define('DB_HOST', 'localhost');
define('DB_NOME', 'mundo_pequenino');
define('DB_USUARIO', 'root');
define('DB_SENHA', '');

// Função que retorna a conexão com o banco de dados
function conectar() {
    $conexao = new mysqli(DB_HOST, DB_USUARIO, DB_SENHA, DB_NOME);

    if ($conexao->connect_error) {
        die('<p style="color:red; font-family:sans-serif; padding:20px;">
            ❌ Erro ao conectar com o banco de dados: ' . $conexao->connect_error . '<br>
            Verifique as configurações em <strong>config/database.php</strong>
        </p>');
    }

    $conexao->set_charset('utf8mb4');
    return $conexao;
}
