<?php
require_once('conex.php');

if (!function_exists('getConexao')) {
    die('A função getConexao não está definida.');
    
}

$message = ''; // Variável para armazenar a mensagem de retorno

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $tipo_id = 1; // ID para "Administrador"

    // Verificar se o email já está cadastrado
    $conn = getConexao();
    $stmt_email = $conn->prepare('SELECT email FROM usuarios WHERE email = ?');
    $stmt_email->bindParam(1, $email, PDO::PARAM_STR);
    $stmt_email->execute();
    $result_email = $stmt_email->fetch(PDO::FETCH_ASSOC);

    if ($result_email !== false) {
        $message = "Este email já está cadastrado.";
    } else {
        // Criptografar senha
        $senha_hash = password_hash($password, PASSWORD_DEFAULT);

        // Inserir no banco
        $stmt_insert = $conn->prepare('INSERT INTO usuarios (nome, senha, email, tipo_id, disciplinas_id) VALUES (?, ?, ?, ?, ?)');
        $disciplinas_id = 1; // Defina um valor padrão ou ajuste conforme necessário
        $stmt_insert->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt_insert->bindParam(2, $senha_hash, PDO::PARAM_STR);
        $stmt_insert->bindParam(3, $email, PDO::PARAM_STR);
        $stmt_insert->bindParam(4, $tipo_id, PDO::PARAM_INT);
        $stmt_insert->bindParam(5, $disciplinas_id, PDO::PARAM_INT); // Ajuste conforme necessário

        if ($stmt_insert->execute()) {
            $message = "Cadastro de administrador realizado com sucesso!";
        } else {
            $message = "Erro ao cadastrar: " . implode(", ", $stmt_insert->errorInfo());
        }
    }

    $stmt_email->closeCursor();
    $stmt_insert->closeCursor();
    $conn = null; // Fecha a conexão
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <h1>Cadastro de Administrador</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>