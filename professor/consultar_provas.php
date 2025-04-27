<!-- <?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// require_once('../conex.php'); // Inclua seu arquivo de conexão
// include('../protect.php'); 
// require_once('verificar_professor.php'); // Inclua a função de verificação

// verificarProfessor();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultar Provas</title>
</head>
<body>
    <h1>Consultar Provas</h1>
    <form method="POST" action="consultar_provas.php">
        <button type="submit">Buscar Provas</button>
    </form>
    <a href="professor.php">voltar</a>
    <?php
    // Verificar se o ID do professor está definido
    // if (!isset($_SESSION['id'])) {
    //     echo "<p>Erro: ID do professor não encontrado na sessão.</p>";
    //     exit;
    // }

    // // Exibir provas cadastradas
    // $conn = getConexao();
    
    // try {
    //     // Prepare a consulta com parâmetros
    //     $stmt = $conn->prepare("SELECT p.id, p.nome, p.data_criacao FROM provas p WHERE p.professor_id = :professor_id");
    //     $stmt->bindParam(':professor_id', $_SESSION['id']);
    //     $stmt->execute();

    //     if ($stmt->rowCount() > 0) {
    //         echo "<h2>Provas Cadastradas:</h2>";
    //         echo "<table>";
    //         echo "<tr><th>Nome</th><th>Data de Criação</th><th>Ações</th></tr>";
    //         while ($prova = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //             echo "<tr>";
    //             echo "<td>{$prova['nome']}</td>";
    //             echo "<td>{$prova['data_criacao']}</td>";
    //             echo "<td>
    //                     <a href='editar_prova.php?id={$prova['id']}'>Editar</a> | 
    //                     <a href='excluir_prova.php?id={$prova['id']}'>Excluir</a>
    //                   </td>";
    //             echo "</tr>";
    //         }
    //         echo "</table>";
    //     } else {
    //         echo "<p>Nenhuma prova cadastrada.</p>";
    //     }
    // } catch (PDOException $e) {
    //     echo "Erro ao consultar provas: " . $e->getMessage();
    // }
    
    ?>
   
</body>
</html> -->