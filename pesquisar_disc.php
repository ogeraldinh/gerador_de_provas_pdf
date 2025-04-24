<?php
require_once('../conex.php');

$buscar = $_POST['buscar'] ?? ''; // Certifique-se de que a variável está definida

// Query base com prepared statement
$sql = "SELECT * FROM disciplinas"; // Certifique-se de que a tabela 'disciplinas' existe

// Adiciona filtro de busca se existir
if (!empty($buscar)) {
    $sql .= " WHERE nome LIKE :buscar"; // Corrigido para usar WHERE
}

$sql .= " ORDER BY nome"; // Corrigido para ordenar pelo nome

try {
    $stmt = $pdo->prepare($sql);
    
    if (!empty($buscar)) {
        $termoBusca = "%$buscar%";
        $stmt->bindParam(':buscar', $termoBusca, PDO::PARAM_STR);
    }
    
    $stmt->execute();
    $result = $stmt;
} catch (PDOException $e) {
    die("Erro ao consultar o banco de dados: " . $e->getMessage());
}
?>