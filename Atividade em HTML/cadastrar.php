<?php
// Configurações do banco de dados
$servername = "localhost";  // Servidor do banco de dados (geralmente localhost)
$username = "root";         // Usuário do MySQL
$password = "";             // Senha do MySQL
$dbname = "cadastro";      // Nome do banco de dados

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coletar dados do formulário
$usuario = $_POST['usuario'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cpf = $_POST['CPF'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança

// Inserir os dados no banco de dados
$sql = "INSERT INTO cadastros (usuario, telefone, email, cpf, senha) VALUES ('$usuario', '$telefone', '$email', '$cpf', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>



