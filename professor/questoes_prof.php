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
        <select name="disciplina" id="disciplina" required>
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
        <select name="assunto" id="assunto" required>
            <option value="">Selecione um assunto</option>
            <?php
            // Carregar assuntos do banco de dados
            $stmt = $conn->query("SELECT * FROM assuntos" );
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <button type="submit">Buscar</button>
    </form>
    <a href="cadastro_questoes.php">Cadastrar questão</a>
    <a href="professor.php">voltar</a>
    <?php
    // Exibir questões após a busca
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $disciplinaId = $_POST['disciplina'];
        $assuntoId = $_POST['assunto'];

        if ($disciplinaId && $assuntoId) {
            $stmt = $conn->prepare("SELECT * FROM questoes WHERE disciplina_id = :disciplinaId AND assunto_id = :assuntoId");
            $stmt->bindParam(':disciplinaId', $disciplinaId);
            $stmt->bindParam(':assuntoId', $assuntoId);
            $stmt->execute();
            if (!empty($busca)) {
                $termoBusca = "%$busca%";
                $stmt->bindParam(':busca', $termoBusca, PDO::PARAM_STR);
            }
            if ($stmt->rowCount() > 0) {
                echo "<h2>Questões Encontradas:</h2><ul>";
                while ($questao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>{$questao['enunciado']} <a href='editar_questao.php?id={$questao['id']}'>Editar</a> | <a href='apagar_questao.php?id={$questao['id']}'>Excluir</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhuma questão encontrada.</p>";
            }
        } else {
            echo "<p>Você deve selecionar uma disciplina e um assunto para a busca de questões.</p>";
        }
    }
    ?>
</body>
</html>