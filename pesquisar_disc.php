<?php
require_once('conex.php');

// Corrigindo o nome da variável (deve ser consistente)
$buscar_disc = filter_input(INPUT_POST, 'buscar_disc') ?? '';

// Query base com prepared statement
$sql = "SELECT disciplinas.id, disciplinas.nome
        FROM disciplinas";

// Adiciona filtro de busca se existir
if (!empty($buscar_disc)) {
    $sql .= " WHERE disciplinas.nome LIKE :busca_disc";
}

$sql .= " ORDER BY disciplinas.nome";

try {
    $stmt = $pdo->prepare($sql);
    
    if (!empty($buscar_disc)) {
        $termoBuscar = "%$buscar_disc%";
        $stmt->bindParam(':busca_disc', $termoBuscar, PDO::PARAM_STR);
    }
    
    $stmt->execute();
    $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao consultar o banco de dados: " . $e->getMessage());
}
?>