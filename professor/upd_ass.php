<?php
require_once('../conex.php');
include('../protect.php');
require_once('verificar_professor.php'); // Inclua a função de verificação

// Chama a função para verificar se o usuário é um Professor
verificarProfessor();
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


        // Atualiza os dados do Assunto
        $stmt = $conn->prepare("UPDATE assuntos SET nome = :nome, disciplina_id = :disciplina_id WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Assunto atualizado com sucesso!";
            echo "<button type='button' class='btn btn-success'><a href='Assunto_admin.php'>Voltar</a></button>";            exit();
            
        } else {
            echo "Erro ao atualizar Assunto.";
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