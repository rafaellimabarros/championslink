<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT usuario as usuario, senha as senha, perfil as perfil, nome as nome FROM funcionarios as f where f.usuario = '$usuario' and f.senha = md5('$senha')";

$resultado = mysqli_query($conexao,$query);

$row = mysqli_num_rows($resultado);

while ($registro = mysqli_fetch_array($resultado))
{
    $perfil = $registro['perfil'];
    $nome = $registro['nome'];
}

if ($row == 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['perfil'] = $perfil;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $nome;
    header('Location: championslink.php');
    exit();
}
else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}
?>