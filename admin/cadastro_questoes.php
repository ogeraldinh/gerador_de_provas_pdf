<?php
require_once('../conex.php');
include('../protect.php');

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

  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/navbar.css" />
  <link rel="stylesheet" href="../assets/css/footer.css" />

  <title>Banco de Questões</title>
</head>

<body>
  <nav class="navbar"></nav>
      <main>
        <form action="" method="POST" class="form-login">
          <label for="enunciado">Digite o Enunciado:</label>
          <input type="text" id="nome" name="nome" required>

          <label for="disciplina">Disciplina que leciona:</label>
          <select id ='disciplina' name="disciplina">
          <?php
            $query = $pdo->query("SELECT id, nome FROM disciplinas ORDER BY nome");
            while($reg = $query->fetch(PDO::FETCH_ASSOC)) {
              echo '<option value="'.$reg["id"].'">'.$reg["nome"].'</option>';    
            }
          ?>
          </select>


          <label for="Alternativa_A">Alternativa A :</label>
          <input type="text" id="Alternativa_A" name="Alternativa_A"  required>
          <label for="Alternativa_B">Alternativa B :</label>
          <input type="text" id="Alternativa_B" name="Alternativa_B" required>
          <label for="Alternativa C">Alternativa C :</label>
          <input type="text" id="Alternativa_C" name="Alternativa_C"  required>
          <label for="Alternativa A">Alternativa D :</label>
          <input type="text" id="Alternativa_D" name="Alternativa_D" required>
          <label for="Alternativa A">Alternativa E :</label>
          <input type="text" id="Alternativa_E" name="Alternativa_E" required>  
            <label for="Correta"> Alternativa Correta</label>
          <select name="Correta" id="Correta">
            <option  value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>

          <button type="submit">Cadastrar</button>

        </form>
      </main>
  <footer class="footer"></footer>

  <script src="../assets/js/navbar.js"></script>
  <script src="../assets/js/footer.js"></script>
</body>

</html>