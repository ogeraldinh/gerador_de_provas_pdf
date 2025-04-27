<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('../conex.php'); 
include('../protect.php'); 
require_once('verificar_professor.php'); 

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
    <form method="POST" action="questoes_prof.php" class="form-login">
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // Executar a consulta
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            echo "<h2>Questões Encontradas:</h2>";
            echo "<form method='POST' action='cabecalho_prova.php'>"; 
            echo "<input type='hidden' name='questoes' value='"; 
            $questoesIds = [];
            while ($questao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questoesIds[] = $questao['id'];
                echo "{$questao['id']},";
            }
            echo "'>"; // Passar os IDs das questões selecionadas
            echo "<table>";
            echo "<tr><th>Selecionar</th><th>Enunciado</th><th>Ações</th></tr>";
           
                      $stmt->execute(); // Execute novamente para obter os resultados
                      while ($questao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo "<tr>";
                          echo "<td><input type='checkbox' name='questoes[]' value='{$questao['id']}'></td>"; // Checkbox para cada questão
                          echo "<td>{$questao['enunciado']}</td>";
                          echo "<td><a href='atualizar_questoes.php?id={$questao['id']}'>Editar</a> | <a href='excluir_questao.php?id={$questao['id']}'>Excluir</a></td>";
                          echo "</tr>";
                      }
                      echo "</table>";
                      echo "<button type='submit'>Próximo: Inserir Cabeçalho da Prova</button>";
                      echo "</form>"; 
                  } else {
                      echo "<p>Nenhuma questão encontrada.</p>";
                  }
              }
              ?>
          </body>
          </html>