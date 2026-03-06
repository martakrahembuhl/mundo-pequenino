<?php
require_once __DIR__ . '/../config/database.php';

// Busca um conteúdo do banco pelo campo 'chave'
function getConteudo($chave, $campo = 'texto') {
    $conexao = conectar();
    $chave = $conexao->real_escape_string($chave);
    $resultado = $conexao->query("SELECT * FROM conteudos WHERE chave = '$chave' LIMIT 1");

    if ($resultado && $resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();
        $conexao->close();
        return htmlspecialchars($dados[$campo] ?? '');
    }

    $conexao->close();
    return '';
}

// Salva (atualiza) um conteúdo no banco
function salvarConteudo($chave, $titulo, $texto) {
    $conexao = conectar();
    $chave   = $conexao->real_escape_string($chave);
    $titulo  = $conexao->real_escape_string($titulo);
    $texto   = $conexao->real_escape_string($texto);

    $conexao->query("UPDATE conteudos SET titulo = '$titulo', texto = '$texto' WHERE chave = '$chave'");
    $conexao->close();
}

// Retorna todos os conteúdos do banco
function getTodosConteudos() {
    $conexao = conectar();
    $resultado = $conexao->query("SELECT * FROM conteudos ORDER BY chave");
    $lista = [];
    if ($resultado) {
        while ($linha = $resultado->fetch_assoc()) {
            $lista[] = $linha;
        }
    }
    $conexao->close();
    return $lista;
}

// Retorna todos os usuários do banco
function getTodosUsuarios() {
    $conexao = conectar();
    $resultado = $conexao->query("SELECT id, nome, usuario, email, tipo, criado_em FROM usuarios ORDER BY id");
    $lista = [];
    if ($resultado) {
        while ($linha = $resultado->fetch_assoc()) {
            $lista[] = $linha;
        }
    }
    $conexao->close();
    return $lista;
}

// Cadastra um novo usuário
function cadastrarUsuario($nome, $usuario, $senha, $email, $tipo = 'editor') {
    $conexao = conectar();
    $nome    = $conexao->real_escape_string($nome);
    $usuario = $conexao->real_escape_string($usuario);
    $email   = $conexao->real_escape_string($email);
    $tipo    = $conexao->real_escape_string($tipo);
    $hash    = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se usuário já existe
    $check = $conexao->query("SELECT id FROM usuarios WHERE usuario = '$usuario'");
    if ($check && $check->num_rows > 0) {
        $conexao->close();
        return ['sucesso' => false, 'mensagem' => 'Nome de usuário já cadastrado.'];
    }

    $ok = $conexao->query("INSERT INTO usuarios (nome, usuario, senha, email, tipo) VALUES ('$nome', '$usuario', '$hash', '$email', '$tipo')");
    $conexao->close();

    if ($ok) {
        return ['sucesso' => true, 'mensagem' => 'Usuário cadastrado com sucesso!'];
    }
    return ['sucesso' => false, 'mensagem' => 'Erro ao cadastrar usuário.'];
}

// Deleta um usuário (não permite deletar o próprio admin logado)
function deletarUsuario($id) {
    $conexao = conectar();
    $id = (int) $id;
    $conexao->query("DELETE FROM usuarios WHERE id = $id AND usuario != 'admin'");
    $conexao->close();
}
