CREATE DATABASE gerador_de_provas;
USE gerador_de_provas;

-- Tabela de Tipos de Usuário
CREATE TABLE tipos_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
);

-- Tabela de Professores
CREATE TABLE disciplinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo_id INT NOT NULL,
    disciplinas_id INT,
    FOREIGN KEY (tipo_id) REFERENCES tipos_usuario(id),
    FOREIGN KEY (disciplinas_id) REFERENCES disciplinas(id) ON DELETE SET NULL
);

  -- Tabela de usuarios normais
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo_id INT NOT NULL);
    
-- Tabela de Assuntos
CREATE TABLE assuntos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    disciplina_id INT NOT NULL,
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id)
);

-- Tabela de Questões
CREATE TABLE questoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enunciado TEXT NOT NULL,
    disciplina_id INT NOT NULL,
    assunto_id INT NOT NULL,
    professor_id INT NOT NULL,
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id),
    FOREIGN KEY (assunto_id) REFERENCES assuntos(id),
    FOREIGN KEY (professor_id) REFERENCES professores(id)
);

-- Tabela de Alternativas (para questões de múltipla escolha)
CREATE TABLE alternativas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    questao_id INT NOT NULL,
    texto TEXT NOT NULL,
    correta BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (questao_id) REFERENCES questoes(id)
);

-- Tabela de Provas
CREATE TABLE provas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (professor_id) REFERENCES professores(id)
);

-- Tabela Relacionando Provas e Questões
CREATE TABLE prova_questoes (
    prova_id INT NOT NULL,
    questao_id INT NOT NULL,
    PRIMARY KEY (prova_id, questao_id),
    FOREIGN KEY (prova_id) REFERENCES provas(id),
    FOREIGN KEY (questao_id) REFERENCES questoes(id)
	ON DELETE CASCADE
);
-- Inserindo Tipos de Usuário (Administrador e Professor)
INSERT INTO tipos_usuario (tipo) VALUES ('Usuario'),('Administrador'), ('Professor');
INSERT INTO disciplinas (nome) VALUES
('Português'),
('Inglês'),
('Espanhol'),
('Educação Física'),
('Artes'),
('Filosofia'),
('Sociologia'),
('História'),
('Geografia'),
('Biologia'),
('Física'),
('Química'),
('Matemática');
