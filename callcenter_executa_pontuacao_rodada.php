<?php
session_start();
include('conexao.php');


$id_funcionario = mysqli_real_escape_string($conexao, $_POST['id_funcionario']);
$pontuacao_01 = mysqli_real_escape_string($conexao, $_POST['pontuacao_01']);
$pontuacao_02 = mysqli_real_escape_string($conexao, $_POST['pontuacao_02']);
$pontuacao_03 = mysqli_real_escape_string($conexao, $_POST['pontuacao_03']);
$pontuacao_04 = mysqli_real_escape_string($conexao, $_POST['pontuacao_04']);
$pontuacao_05 = mysqli_real_escape_string($conexao, $_POST['pontuacao_05']);
$usuario_pontuador = $_SESSION['nome'];
$id_rodada = mysqli_real_escape_string($conexao, $_POST['id_rodada']);


$query_verifica = "SELECT
pr01.id_pontos_rodada_01,
pr01.data_criacao
from pontos_rodada_01 as pr01
where pr01.id_funcionario = '$id_funcionario' and pr01.data_criacao = CURDATE();";

$resultado_verifica = mysqli_query($conexao,$query_verifica);

$row_verifica = mysqli_num_rows($resultado_verifica);

if ($row_verifica >= 1) {
    mysqli_close($conexao);
    $_SESSION['ponto_nao_sucesso'] = true;
    $_SESSION['funcionario_pontuado'] = $id_funcionario;
    header('Location: callcenter_rodadas_new.php');
    exit();
}
else{
    $query = "INSERT INTO `pontos_rodada_01` (`id_pontos_rodada_01`, `data`, `id_funcionario`, `ponto_01`, `ponto_02`, `ponto_03`, `ponto_04`, `ponto_05`, `usuario_pontuador`, `observacao`, `data_criacao`, `usuario_modificador`, `data_modificacao`, `id_rodada`) 
    VALUES (NULL, current_timestamp(), '$id_funcionario', '$pontuacao_01', '$pontuacao_02', '$pontuacao_03', '$pontuacao_04', '$pontuacao_05', '$usuario_pontuador', NULL, now(), NULL, current_timestamp(), '$id_rodada');";

    $resultado = mysqli_query($conexao,$query);
    mysqli_close($conexao);
    $_SESSION['ponto_sucesso'] = true;
    $_SESSION['funcionario_pontuado'] = $id_funcionario;
    header('Location: callcenter_rodadas_new.php');
    exit();
}

?>