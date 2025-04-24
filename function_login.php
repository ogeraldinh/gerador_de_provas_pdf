<?php 
require_once('conex.php');

if (!function_exists('getConexao')) {
    die('A função getConexao não está definida.');
}

session_start();
$message = ''; // Variável para armazenar a mensagem de retorno

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = getConexao();
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta ao banco de dados na tabela usuarios
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verificação de senha e email
    if ($stmt->rowCount() == 1) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Use FETCH_ASSOC para obter um array associativo
        $hashedPassword = $result['senha']; // A senha armazenada no banco

        if (password_verify($password, $hashedPassword)) {
            // Armazene o ID do usuário, o email e o tipo na sessão
            $_SESSION['id'] = $result['id']; // Armazena o ID do usuário
            $_SESSION['email'] = $result['email']; // Armazena o email do usuário
            $_SESSION['tipo_id'] = $result['tipo_id']; // Armazena o tipo do usuário

            // Redireciona com base no tipo de usuário
            if ($_SESSION['tipo_id'] == 1) { // Admin
                header("Location: admin.php"); // Redireciona para o painel do administrador
            } else {
                header("Location: index.php"); // Redireciona para a página inicial
            }
            exit();
        } else {
            $message = 'Senha incorreta.';
        }
    } else {
        $message = 'Usuário não encontrado.';
    }
    $stmt->closeCursor();
}
?>