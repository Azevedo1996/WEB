<!-- processar_login.php -->

<?php
session_start();

// Configurações do banco de dados
$hostname = 'localhost';  // substitua pelo nome do servidor MySQL
$username = 'seu_usuario';  // substitua pelo nome de usuário do MySQL
$password = 'sua_senha';  // substitua pela senha do MySQL
$database = 'nome_do_banco_de_dados';  // substitua pelo nome do banco de dados

// Conexão com o banco de dados
$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_errno) {
    echo 'Falha ao conectar ao MySQL: ' . $mysqli->connect_error;
    exit;
}

// Obtém os valores do formulário de login
$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta SQL para verificar as credenciais do usuário
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $mysqli->query($sql);

if ($result->num_rows === 1) {
    // Autenticação bem-sucedida
    $_SESSION['autenticado'] = true;
    header('Location: consulta.html');
} else {
    // Autenticação falhou
    $_SESSION['autenticado'] = false;
    echo 'Credenciais inválidas. Tente novamente.';
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
