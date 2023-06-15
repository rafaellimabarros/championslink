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
echo "<th>id_time</th>";
echo "<th>time</th>";
echo "<th>total</th>";
echo "</tr>";

$sql = "SELECT 
t.id_time as id_time,
t.nome as time,
SUM(ponto_01+ponto_02+ponto_03+ponto_04+ponto_05) AS total 

FROM pontos_rodada_01 as ptr01
INNER join funcionarios as f on f.id_funcionario = ptr01.id_funcionario
inner join times as t on t.id_time = f.id_time

where ptr01.id_rodada = '$id_rodada'
GROUP BY t.id_time
ORDER BY total desc;";

$resultado = mysqli_query($conexao,$sql);

while ($registro = mysqli_fetch_array($resultado))
{
    $grupo[] = $registro;
    $id_time = $registro['id_time'];
    $time = $registro['time'];
    $total = $registro['total'];

    echo "<tr>";
    echo "<td>".$id_time."</td>";
    echo "<td>".$time."</td>";
    echo "<td>".$total."</td>";
    echo "</tr>";
}

mysqli_close($conexao);
echo "</table>";

$arqExcel = "<meta charset='UTF-8'>";

$arqExcel .= "echo '<table border=1>';
echo '<tr>';
echo '<th>id_time</th>';
echo '<th>time</th>';
echo '<th>total</th>';
echo '</tr>'";

while ($registro = mysqli_fetch_array($resultado))
{
    $grupo[] = $registro;
    $id_time = $registro['id_time'];
    $time = $registro['time'];
    $total = $registro['total'];

 $arqExcel .= "echo '<tr>';
    echo '<td>'.$id_time.'</td>';
    echo '<td>'.$time.'</td>';
    echo '<td>'.$total.'</td>';
    echo '</tr>'";
}

$arqExcel = "echo '</table>'";
?>