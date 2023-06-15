<?php
session_start();
include('conexao.php');

$id_pontuacao = mysqli_real_escape_string($conexao, $_POST['id_pontuacao']);
$pontuacao_01 = mysqli_real_escape_string($conexao, $_POST['pontuacao_01']);
$pontuacao_02 = mysqli_real_escape_string($conexao, $_POST['pontuacao_02']);
$pontuacao_03 = mysqli_real_escape_string($conexao, $_POST['pontuacao_03']);
$pontuacao_04 = mysqli_real_escape_string($conexao, $_POST['pontuacao_04']);
$pontuacao_05 = mysqli_real_escape_string($conexao, $_POST['pontuacao_05']);
$observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
$usuario_modificador = $_SESSION['nome'];

$query = "UPDATE pontos_rodada_01
SET ponto_01 = '$pontuacao_01', 
ponto_02 = '$pontuacao_02',
ponto_03 = '$pontuacao_03',
ponto_04 = '$pontuacao_04',
ponto_05 = '$pontuacao_05',
observacao = '$observacao',
usuario_modificador = '$usuario_modificador',
data_modificacao = current_timestamp()
WHERE id_pontos_rodada_01 = '$id_pontuacao'";

$resultado = mysqli_query($conexao,$query);
mysqli_close($conexao);
$_SESSION['editado_sucesso'] = true;
header('Location: championslink.php');
exit();

?>