<?php
require_once('../conex.php');
include('../protect.php');

// Inicia sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $disciplina_id = $_POST['disciplina'];

        $conn = getConexao();

        // Verificar se o tipo_id existe (se necessário)
        // Se você não estiver usando $tipo_id, remova essa parte
        // $stmt_check = $conn->prepare('SELECT id FROM tipos_usuario WHERE id = ?');
        // $stmt_check->bindParam(1, $tipo_id, PDO::PARAM_INT);
        // $stmt_check->execute();
        // $result_check = $stmt_check->fetch(PDO::FETCH_ASSOC);
        // if ($result_check === false) {
        //     return "Erro: Tipo de usuário inválido.";
        // }

        // Verificar email duplicado
        $stmt_email = $conn->prepare('SELECT email FROM usuarios WHERE email = ? AND id != ?');
        $stmt_email->bindParam(1, $email, PDO::PARAM_STR);
        $stmt_email->bindParam(2, $id, PDO::PARAM_INT); // Exclui o próprio registro
        $stmt_email->execute();
        $result_email = $stmt_email->fetch(PDO::FETCH_ASSOC);

        if ($result_email !== false) {
            echo "Este email já está cadastrado.";
            exit();
        }

        // Atualiza os dados do professor
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, disciplinas_id = :disciplina_id WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Professor atualizado com sucesso!";
            echo "<button type='button' class='btn btn-success'><a href='../professor.php'>Voltar</a></button>";            exit();
            
        } else {
            echo "Erro ao atualizar professor.";
        }
    } else {
        echo "Método de requisição inválido.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão
$conn = null;
?>