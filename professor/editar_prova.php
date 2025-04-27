<!-- <?php
// session_start();
// require_once('../conex.php'); // Inclua seu arquivo de conexão
// include('../protect.php'); 
// require_once('verificar_professor.php'); // Inclua a função de verificação

// verificarProfessor();

// if (isset($_GET['id'])) {
//     $provaId = $_GET['id'];
//     $conn = getConexao();

//        // Obter dados da prova
//        $stmt = $conn->prepare("SELECT * FROM provas WHERE id = :id AND professor_id = :professor_id");
//        $stmt->bindParam(':id', $provaId);
//        $stmt->bindParam(':professor_id', $_SESSION['id']);
//        $stmt->execute();
   
//        if ($stmt->rowCount() > 0) {
//            $prova = $stmt->fetch(PDO::FETCH_ASSOC);
//        } else {
//            echo "<p>Prova não encontrada.</p>";
//            exit;
//        }
//    } else {
//        echo "<p>ID da prova não fornecido.</p>";
//        exit;
//    }
   ?>
   
   <!DOCTYPE html>
   <html lang="pt-BR">
   <head>
       <meta charset="UTF-8">
       <title>Editar Prova</title>
   </head>
   <body>
       <h1>Editar Prova</h1>
       <form method="POST" action="atualizar_prova.php">
           <input type="hidden" name="id" value="<?php echo $prova['id']; ?>">
           <label for="nome">Nome da Prova:</label>
           <input type="text" name="nome" id="nome" value="<?php echo $prova['nome']; ?>" required>
   
           <button type="submit">Salvar Alterações</button>
       </form>
       <a href="consultar_provas.php">Voltar</a>
   </body>
   </html> -->