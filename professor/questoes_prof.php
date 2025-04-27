<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('../conex.php'); // Inclua seu arquivo de conexão
include('../protect.php'); 
require_once('verificar_professor.php'); // Inclua a função de verificação

// Chama a função para verificar se o usuário é um Professor
verificarProfessor();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Questões</title>
</head>
<body>
    <h1>Consultar Questões</h1>
    <form method="POST" action="questoes_prof.php">
        <label for="disciplina">Disciplina:</label>
        <select name="disciplina" id="disciplina">
            <option value="">Selecione uma disciplina</option>
            <?php
            // Carregar disciplinas do banco de dados
            $conn = getConexao();
            $stmt = $conn->query("SELECT * FROM disciplinas");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="assunto">Assunto:</label>
        <select name="assunto" id="assunto">
            <option value="">Selecione um assunto</option>
            <?php
            // Carregar assuntos do banco de dados
            $stmt = $conn->query("SELECT * FROM assuntos");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <button type="submit">Buscar</button>
    </form>
    <a href="cadastro_questoes.php">Cadastrar questão</a>
    <a href="professor.php">Voltar</a>
    
    <?php
    // Exibir questões após a busca
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $disciplinaId = $_POST['disciplina'];
        $assuntoId = $_POST['assunto'];

        if ($disciplinaId || $assuntoId) {
            $query = "SELECT * FROM questoes WHERE 1=1";
            if ($disciplinaId) {
                $query .= " AND disciplina_id = :disciplinaId";
            }
            if ($assuntoId) {
                $query .= " AND assunto_id = :assuntoId";
            }
            $stmt = $conn->prepare($query);
            if ($disciplinaId) {
                $stmt->bindParam(':disciplinaId', $disciplinaId);
            }
            if ($assuntoId) {
                $stmt->bindParam(':assuntoId', $assuntoId);
            }
        } else {
            // Se não houver filtro, buscar todas as questões
            $stmt = $conn->query("SELECT * FROM questoes");
        }

        if ($stmt->execute() && $stmt->rowCount() > 0) {  //verificará se existem questões cadastradas no banco de dados
            echo "<h2>Questões Encontradas:</h2>";
            echo "<table>";
            echo "<tr><th>Enunciado</th><th>Ações</th></tr>";
            while ($questao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$questao['enunciado']}</td>";
                echo "<td><a href='atualizar_questoes.php?id={$questao['id']}'>Editar</a> | <a href='excluir_questao.php?id={$questao['id']}'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhuma questão encontrada.</p>";
        }
    }
    ?>
</body>
</html>