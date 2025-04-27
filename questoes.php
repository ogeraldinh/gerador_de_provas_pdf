<?php
require_once('conex.php');
include('protect.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/navbar.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

  <title>Banco de Questões</title>
</head>

<body>
  <nav class="navbar"></nav>
      <main>
      <form method="POST" action="questoes_.php">
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
        </select><button type="submit">Buscar</button>
      </main>
  <footer class="footer"></footer>

  <script src="assets/js/navbar.js"></script>
  <script src="assets/js/footer.js"></script>
</body>

</html>