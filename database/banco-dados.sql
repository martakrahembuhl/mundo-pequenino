-- ==============================================
-- Banco de dados: Mundo Pequenino
-- Escola de Educação Infantil
-- ==============================================

CREATE DATABASE IF NOT EXISTS mundo_pequenino CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mundo_pequenino;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    tipo ENUM('admin', 'editor') DEFAULT 'editor',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de conteúdos do site
CREATE TABLE IF NOT EXISTS conteudos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chave VARCHAR(100) NOT NULL UNIQUE,
    titulo VARCHAR(200),
    texto TEXT,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Usuário admin padrão (senha: admin123)
INSERT INTO usuarios (nome, usuario, senha, email, tipo) VALUES
('Administrador', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@mundopequenino.com', 'admin');

-- Conteúdos iniciais do site
INSERT INTO conteudos (chave, titulo, texto) VALUES
('home_titulo', 'Título da Home', 'Bem-vindo ao Mundo Pequenino!'),
('home_subtitulo', 'Subtítulo da Home', 'Um lugar mágico onde cada criança brilha do seu jeito especial 🌟'),
('home_descricao', 'Descrição da Home', 'Na Escola Mundo Pequenino, acreditamos que cada criança é única e especial. Nosso ambiente acolhedor e colorido estimula a curiosidade, a criatividade e o desenvolvimento integral desde os primeiros anos de vida.'),
('sobre_titulo', 'Título Sobre', 'Conheça a Nossa Escola'),
('sobre_texto', 'Texto Sobre', 'Fundada com amor e dedicação, a Escola Mundo Pequenino é um espaço pensado para que cada criança se sinta segura, amada e livre para aprender brincando. Nossa equipe é formada por profissionais apaixonados pela educação infantil, prontos para acompanhar cada passo do desenvolvimento do seu filho.'),
('sobre_missao', 'Missão', 'Desenvolver integralmente crianças de 0 a 6 anos através de uma educação lúdica, respeitosa e repleta de afeto, preparando-as para o mundo com autonomia e alegria.'),
('sobre_visao', 'Visão', 'Ser referência em educação infantil, reconhecida pela excelência pedagógica e pelo ambiente acolhedor que transforma pequenos momentos em grandes aprendizados.'),
('contato_endereco', 'Endereço', 'Rua das Flores, 123 - Jardim Alegre'),
('contato_telefone', 'Telefone', '(47) 99999-1234'),
('contato_email', 'E-mail', 'contato@mundopequenino.com'),
('contato_horario', 'Horário de Funcionamento', 'Segunda a Sexta: 7h às 18h'),
('servico1_titulo', 'Berçário', 'Berçário (0 a 2 anos)'),
('servico1_texto', 'Texto Berçário', 'Ambiente seguro e afetuoso para os pequeninhos darem seus primeiros passos no mundo com muito carinho e estimulação sensorial adequada para cada fase.'),
('servico2_titulo', 'Maternal', 'Maternal (2 a 4 anos)'),
('servico2_texto', 'Texto Maternal', 'Através de brincadeiras, músicas e atividades lúdicas, as crianças desenvolvem linguagem, coordenação motora e habilidades sociais fundamentais.'),
('servico3_titulo', 'Jardim', 'Jardim de Infância (4 a 6 anos)'),
('servico3_texto', 'Texto Jardim', 'Preparação para a alfabetização com atividades pedagógicas ricas, estimulando o raciocínio lógico, a criatividade e o amor pelo aprendizado.');
