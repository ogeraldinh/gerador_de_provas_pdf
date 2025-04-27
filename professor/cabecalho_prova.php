<!-- <?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// require_once('../conex.php'); // Inclua seu arquivo de conexão
// include('../protect.php'); 
// require_once('verificar_professor.php'); // Inclua a função de verificação

// // Chama a função para verificar se o usuário é um Professor
// verificarProfessor();

// require('fpdf.php');

// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Cell(0, 10, 'Cabeçalho do Documento', 0, 1, 'C');
// $pdf->Output('D', 'documento.pdf');
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Verificar se o nome da prova foi enviado
//     $nomeProva = isset($_POST['nome_prova']) ? $_POST['nome_prova'] : '';
//     $questoesSelecionadas = isset($_POST['questoes']) ? $_POST['questoes'] : []; // Array com os IDs das questões selecionadas

//     // Verificar se a sessão do professor está definida
//     if (!isset($_SESSION['id'])) {
//         die("Erro: Professor não autenticado.");
    // }

    // // Salvar a prova no banco de dados
    // $conn = getConexao();
    // $stmt = $conn->prepare("INSERT INTO provas (professor_id, nome) VALUES (:professor_id, :nome)");
    // $stmt->bindParam(':professor_id', $_SESSION['id']);
    // $stmt->bindParam(':nome', $nomeProva);
    
    // // Tente executar a inserção
    // try {
    //     $stmt->execute();
    //     $prova_id = $conn->lastInsertId(); // Obter o ID da prova recém-criada

    //     // Inserir as questões na tabela prova_questoes
    //     foreach ($questoesSelecionadas as $questao_id) {
    //         $stmt = $conn->prepare("INSERT INTO prova_questoes (prova_id, questao_id) VALUES (:prova_id, :questao_id)");
    //         $stmt->bindParam(':prova_id', $prova_id);
    //         $stmt->bindParam(':questao_id', $questao_id);
    //         $stmt->execute();
    //     }

    //     echo "Prova e questões salvas com sucesso!";
    // } catch (PDOException $e) {
    //     echo "Erro ao salvar a prova: " . $e->getMessage();
    // }
// } else {
    // Se não for um POST, exiba o formulário
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Cabeçalho da Prova</title>
    </head>
    <body>
        <h1>Inserir Cabeçalho da Prova</h1>
        <form method="POST" action="cabeçalho_prova.php">
            <input type="hidden" name="questoes" value="<?php echo htmlspecialchars($_GET['questoes']); ?>">
            <label for="nome_prova">Nome da Prova:</label>
            <input type="text" name="nome_prova" id="nome_prova" required>
            <button type="submit">Salvar Cabeçalho e Questões</button>
        </form>
    </body>
    </html>
    <?php
// }
?> -->