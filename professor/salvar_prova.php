<!-- <?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// require_once('../conex.php'); // Inclua seu arquivo de conexão
// include('../protect.php'); 
// require_once('verificar_professor.php'); // Inclua a função de verificação

// // Chama a função para verificar se o usuário é um Professor
// verificarProfessor();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $prova_id = $_POST['prova_id'];
//     $questoesSelecionadas = $_POST['questoes']; // Array com os IDs das questões selecionadas

//     // Conexão com o banco de dados
//     $conn = getConexao();

    // Inicia uma transação
//     $conn->beginTransaction();
//     try {
//         // Inserir as questões na tabela prova_questoes
//         foreach ($questoesSelecionadas as $questao_id) {
//             $stmt = $conn->prepare("INSERT INTO prova_questoes (prova_id, questao_id) VALUES (:prova_id, :questao_id)");
//             $stmt->bindParam(':prova_id', $prova_id);
//             $stmt->bindParam(':questao_id', $questao_id);
//             $stmt->execute();
//         }

//         // Confirma a transação
//         $conn->commit();
//         echo "Questões salvas com sucesso na prova!";
//     } catch (Exception $e) {
//         // Se ocorrer um erro, reverte a transação
//         $conn->rollBack();
//         echo "Erro ao salvar as questões: " . $e->getMessage();
//     }
// } else {
//     echo "Nenhuma questão selecionada.";
// }
?> -->