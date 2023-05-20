<?php
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

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $devweb = $_POST['devweb'];
    $senioridade = $_POST['senioridade'];
    $tecnologias = implode(', ', $_POST['tecnologias']);
    $experiencia = $_POST['experiencia'];

    // Prepara a consulta SQL
    $sql = "INSERT INTO cadastro_devs (nome, sobrenome, email, devweb, senioridade, tecnologias, experiencia)
            VALUES ('$nome', '$sobrenome', '$email', '$devweb', '$senioridade', '$tecnologias', '$experiencia')";

    // Executa a consulta
    if ($mysqli->query($sql)) {
        echo 'Cadastro realizado com sucesso!';
    } else {
        echo 'Erro ao cadastrar: ' . $mysqli->error;
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
