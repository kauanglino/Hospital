<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "hospital_plainsboro";

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Conexao falhou: " . mysqli_connect_error());
  }
?>