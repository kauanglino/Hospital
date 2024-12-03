<?php 

include "conexao.php";

$nome = $_REQUEST['nome'];
$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];
$email = $_REQUEST['email'];

$senha = password_hash($senha, PASSWORD_DEFAULT);

$sql_usuario = "SELECT * FROM usuario WHERE login = '$login'";

$record = mysqli_query($conexao, $sql_usuario);

if(mysqli_num_rows($record) > 0)
{
    echo "<script>
            alert('Usuário já cadastrado com este e-mail');
            window.location.href = 'index.html#cadastro';
          </script>";
}
else
{
    $sql = "INSERT INTO usuario (nome, login, email, senha, tipo) VALUES ('$nome', '$login', '$email', '$senha', '0')";

    //executa a consulta e retorna o(s) registro(s)
    if(mysqli_query($conexao, $sql))
    {
        echo "<script>
            alert('Usuário cadastrado com sucesso');
            window.location.href = 'index.html';
          </script>";
    }
    else
    {
        echo "<script>
            alert('Erro ao cadastrar');
            window.location.href = 'index.html#cadastro';
          </script>";
    }
}

?>