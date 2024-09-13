<?php
session_start(); // Inicia a sessão para que possa ser utilizada em outros lugares.

// Configurações de conexão
$dbhost = 'LocalHost';
$banco = 'bolodivo';
$user = 'root';
$senha_user = '';

$con = mysqli_connect($dbhost, $user, $senha_user, $banco);

// Verificar conexão
if (!$con) {
    die('Conexão falhou: ' . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletar e escapar os dados do formulário
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mensagem = mysqli_real_escape_string($con, $_POST['mensagem']);

    // Preparar a instrução SQL
    $stmt = $con->prepare("INSERT INTO contact (nome, email, mensagem) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die('Erro ao preparar a instrução: ' . $con->error);
    }
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    if ($stmt->execute()) {
        echo 'Mensagem enviada com sucesso.';
    } else {
        echo 'Erro ao inserir dados: ' . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($con); // Fecha a conexão com o banco de dados
?>
