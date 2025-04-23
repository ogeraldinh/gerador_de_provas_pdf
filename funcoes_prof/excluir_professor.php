<?php 
require_once('../conex.php'); // Ajuste o caminho se necessário

require_once('../admin/verificar_admin.php'); // Inclua a função de verificação

// Chama a função para verificar se o usuário é um administrador
verificarAdmin(); // conexão está sendo feita corretamente

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = getConexao(); // Certifique-se de que a conexão está correta

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Iniciar a exclusão do professor
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Use bindParam para PDO

    // Verificar se a execução foi bem-sucedida
    if ($stmt->execute()) {
       
        echo "Professor excluído com sucesso!";
        echo "<button type='button' class='btn btn-success'><a href='../professor.php'>Voltar</a></button>";            exit();
    } else {
        echo "Erro ao excluir o professor.";
    }
} else {
    echo "ID do professor não fornecido.";
}
?>