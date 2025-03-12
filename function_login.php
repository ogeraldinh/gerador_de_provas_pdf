<?php 
require_once('conex.php');
session_start();
$message = ''; // Variável para armazenar a mensagem de retorno

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Consulta ao banco de dados na tabela usuario
    $stmt = $conn->prepare('SELECT * FROM usuario WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificação de senha e email
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($pass, $usuario['senha'])){
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            header("Location: index.php"); // Redireciona para a página inicial
            exit();
        } else {
            $message = 'Senha incorreta.';
        }
    } else {
        $message = 'Usuário não encontrado.';
    }
    $stmt->close();
}
?>