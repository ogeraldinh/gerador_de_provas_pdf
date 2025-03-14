<?php 
require_once('conex.php');
if (!function_exists('getConexao')) {
    die('A função get_conexao não está definida.');
}
session_start();
$message = ''; // Variável para armazenar a mensagem de retorno

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $conn=getConexao();
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta ao banco de dados na tabela usuario
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    

    // Verificação de senha e email
    if ($stmt->rowCount() == 1 ) {
        $result = $stmt->fetch();
        $usuario = $result['senha'];
        if (password_verify($password, $usuario)){
            $_SESSION['id'] = $usuario;
            $_SESSION['email'] = $usuario;
            header("Location: index.html"); // Redireciona para a página inicial
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