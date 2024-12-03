<?php
//inclui a conexao
include "conexao.php";

$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$sql = "SELECT * FROM usuario WHERE login = '$login' LIMIT 1";

$record = mysqli_query($conexao, $sql);

if(mysqli_num_rows($record) > 0)
{
    $usuario = mysqli_fetch_assoc($record);
  
    $senha_bd = $usuario['senha'];
    if(!password_verify($senha, $senha_bd))
    {
     echo "<script>
           alert('Senha incorreta');
           window.location.href = 'index.html';
         </script>";
         }
     else
    {
     $nome = $usuario['nome'];
     $tipo = $usuario['tipo'];
     header("Location: home.php?nome=".$nome."&tipo=".$tipo);
    }
}
else
  echo "<script>
           alert('Usuário não cadastrado');
           window.location.href = 'index.html';
         </script>";
?>
