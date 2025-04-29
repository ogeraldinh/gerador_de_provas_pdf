<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('conex.php');
include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Questões</title>
</head>
<body>
    <h1>Selecionar Questões</h1>
    <form method="POST" action="questoes.php" class="form-login">
        <label for="disciplina">Disciplina:</label>
        <select name="disciplina" id="disciplina">
            <option value="">Selecione uma disciplina</option>
            <?php
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
            $stmt = $conn->query("SELECT * FROM assuntos");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <button type="submit">Buscar Questões</button>
    </form>
            <a href="index.php">Voltar</a>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['disciplina'])) {
        $disciplinaId = $_POST['disciplina'];
        $assuntoId = $_POST['assunto'];

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

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            echo "<h2>Escolha as Questões que quer Resolver:</h2>";

            echo "<form method='POST' action='responder_questoes.php'>";
            echo "<table border='1'>";
            echo "<tr><th>Selecionar</th><th>Enunciado</th></tr>";

            while ($questao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='questoes_selecionadas[]' value='{$questao['id']}'></td>";
                echo "<td>{$questao['enunciado']}</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<button type='submit'>Próximo: Responder Questões</button>";
            echo "</form>";
        } else {
            echo "<p>Nenhuma questão encontrada.</p>";
        }
    }
    ?>
</body>
</html>
