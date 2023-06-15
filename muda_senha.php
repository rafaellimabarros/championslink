<?php
session_start();
include('conexao.php');

$usuario = $_SESSION['usuario'];
$antigasenha = mysqli_real_escape_string($conexao, $_POST['antigasenha']);
$novasenha = mysqli_real_escape_string($conexao, $_POST['novasenha']);
$novasenha2 = mysqli_real_escape_string($conexao, $_POST['novasenha2']);
$senha = $novasenha2;

$query = "UPDATE funcionarios set senha = md5('$novasenha') where funcionarios.usuario = '$usuario'";

if($novasenha == $novasenha2 && $antigasenha == $_SESSION['senha'] && strlen($novasenha2) >= 8){
    $resultado = mysqli_query($conexao,$query);
    mysqli_close($conexao);
    $_SESSION['senha_sucesso'] = true;
    header('Location: index.php');
    exit();
}elseif($novasenha == $novasenha2 && $antigasenha == $_SESSION['senha'] && strlen($novasenha2) < 8){
    $_SESSION['senha_menor'] = true;
    header('Location: pagina_senha.php');
    exit();
}elseif($novasenha == $novasenha2 && $antigasenha != $_SESSION['senha'] && strlen($novasenha2) >= 8){
    $_SESSION['senha_antiga_nao_confere'] = true;
    header('Location: pagina_senha.php');
    exit();
}elseif($novasenha == $novasenha2 && $antigasenha != $_SESSION['senha'] && strlen($novasenha2) < 8){
    $_SESSION['senha_antiga_nao_confere'] = true;
    header('Location: pagina_senha.php');
    exit();
}elseif($novasenha != $novasenha2 && $antigasenha == $_SESSION['senha'] && strlen($novasenha2) >= 8){
    $_SESSION['nova_senha_nao_igual'] = true;
    header('Location: pagina_senha.php');
    exit();
}else{
    $_SESSION['nova_senha_nao_igual'] = true;
    header('Location: pagina_senha.php');
    exit();
}
?>