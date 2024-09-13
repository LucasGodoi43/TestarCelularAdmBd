<?php

$dbhost = 'LocalHost';
$banco = 'bolodivo';
$user = 'root';
$senha_user = '';

$con = mysqli_connect($dbhost, $user, $senha_user, $banco);

// Verificar conexão
if (!$con) {
    die('Conexão falhou: ' . mysqli_connect_error());
}
if (isset($_POST['email_footer'])) {
    if (strlen($_POST['email_footer']) <= 12) {
        echo "Preencha seu email";
    } 
    else
    {
    // Coletar e escapar os dados do formulário
    $email_footer = mysqli_real_escape_string($con, $_POST['email_footer']);
    
        // Inserir o novo cliente
        $stmt = $con->prepare("INSERT INTO cadastro_email (email_footer, id) VALUES (?, ?)");
        $stmt->bind_param("ss", $email_footer, $id);

        if ($stmt->execute())
        {
            echo 'Realizado com sucesso';
        }
         else
        {
            echo 'Erro ao inserir dados: ' . $stmt->error;
        }

        $stmt->close();

}
}
?>