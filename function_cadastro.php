<?php
function cadastrarUsuario($nome, $email, $password, $disciplina) {
    $conn = getconexao();
    $message = '';
    $tipo_id = 2; // ID para "Professor"

    // Verificar se o tipo_id existe
    $stmt_check = $conn->prepare('SELECT id FROM tipos_usuario WHERE id = ?');
    $stmt_check->bindparam('i', $tipo_id);
    $stmt_check->execute();
    $result_check = $stmt_check->fetch();

    if ($result_check->num_rows == 0) {
        return "Erro: Tipo de usuário inválido.";
    }

    // Verificar email duplicado
    $stmt_email = $conn->prepare('SELECT email FROM usuarios WHERE email = ?');
    $stmt_email->bindParam('s', $email);
    $stmt_email->execute();
    $result_email = $stmt_email->fetch();

    if ($result_email->num_rows > 0) {
        return "Este email já está cadastrado.";
    }

    // Mapear disciplina para ID
    $disciplinas = [
        'portugues' => 1, 'ingles' => 2, 'espanhol' => 3,
        'educacao_fisica' => 4, 'artes' => 5, 'filosofia' => 6,
        'sociologia' => 7, 'historia' => 8, 'geografia' => 9,
        'biologia' => 10, 'fisica' => 11, 'quimica' => 12, 'matematica' => 13
    ];

    $disciplinas_id = $disciplinas[$disciplina] ?? null;

    if ($disciplinas_id === null) {
        return "Disciplina inválida.";
    }

    // Criptografar senha
    $senha_hash = password_hash($password, PASSWORD_DEFAULT);

    // Inserir no banco
    $stmt_insert = $conn->prepare('INSERT INTO usuarios (nome, senha, email, tipo_id, disciplinas_id) VALUES (?, ?, ?, ?, ?)');
    $stmt_insert->bindparam('sssii', $nome, $senha_hash, $email, $tipo_id, $disciplinas_id);

    if ($stmt_insert->execute()) {
        $message = "Cadastro realizado com sucesso!";
    } else {
        $message = "Erro ao cadastrar: " . $stmt_insert->error;
    }

    $stmt_insert->Close();
    $conn->close();
    return $message;
}

// Processar formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $disciplina = $_POST['disciplina'] ?? '';
    $message = cadastrarUsuario($nome, $email, $password, $disciplina);
}
?>