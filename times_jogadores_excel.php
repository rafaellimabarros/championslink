<?php
include('verifica_login.php');
include('conexao.php');

if ($_SESSION['perfil'] == 'c2'){
    header('Location: championslink.php');
    exit();
}

$id_rodada =  $_POST['id_rodada'];

header("Content-Type: application/xls");
header("Content-Disposition:attachment; filename = tabela.xls");

echo "<table border=1>";
echo "<tr>";
echo "<th>id_funcionario</th>";
echo "<th>nome</th>";
echo "<th>time</th>";
echo "<th>total</th>";
echo "</tr>";

$sql = "SELECT
f.id_funcionario as id_funcionario,
f.nome as nome,
(select t.nome from times as t where t.id_time = f.id_time) as time,
SUM(ponto_01+ponto_02+ponto_03+ponto_04+ponto_05) AS total

FROM pontos_rodada_01 as p
inner join funcionarios as f on f.id_funcionario = p.id_funcionario

where p.id_rodada = '$id_rodada'
GROUP by f.id_funcionario
order by total desc;";

$resultado = mysqli_query($conexao,$sql);

while ($registro = mysqli_fetch_array($resultado))
{
    $grupo[] = $registro;
    $id_funcionario = $registro['id_funcionario'];
    $nome = $registro['nome'];
    $time = $registro['time'];
    $total = $registro['total'];

    echo "<tr>";
    echo "<td>".$id_funcionario."</td>";
    echo "<td>".$nome."</td>";
    echo "<td>".$time."</td>";
    echo "<td>".$total."</td>";
    echo "</tr>";
}

mysqli_close($conexao);
echo "</table>";

$arqExcel = "<meta charset='UTF-8'>";

$arqExcel .= "echo '<table border=1>';
echo '<tr>';
echo '<th>id_funcionario</th>';
echo '<th>nome</th>';
echo '<th>time</th>';
echo '<th>total</th>';
echo '</tr>'";

while ($registro = mysqli_fetch_array($resultado))
{
    $grupo[] = $registro;
    $id_funcionario = $registro['id_funcionario'];
    $nome = $registro['nome'];
    $time = $registro['time'];
    $total = $registro['total'];

 $arqExcel .= "echo '<tr>';
    echo '<td>'.$id_funcionario.'</td>';
    echo '<td>'.$nome.'</td>';
    echo '<td>'.$time.'</td>';
    echo '<td>'.$total.'</td>';
    echo '</tr>'";
}

$arqExcel = "echo '</table>'";
?>