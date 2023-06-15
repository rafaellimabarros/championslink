<?php
session_cache_limiter('private_no_expire');
include('verifica_login.php');
include('conexao.php');

$id_rodada =  $_POST['id_rodada'];

if ($_SESSION['perfil'] == 'cs2'){
    header('Location: championslink.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br" style="height: 100%; min-height: 100%;">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/champicone.ico" />
        <link rel="stylesheet" type="text/css" href="estilos.css" />
        <script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title> Champions Link </title>
        <style type="text/css">
            .parametrosform2{
            border: 1px solid black;
            border-radius:5px;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);    
        }
        </style>
    </head>

    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand fs-4 text-center" href="championslink.php">
                    <img src="img/champicone.png" alt="" width="35" height="35" class="d-inline-block align-text-top rounded">
                       <label style="cursor: pointer;font-size: 25px; color: white; font-weight: bold; text-shadow: 2px 2px 4px black;"> Champions Link </label>
                </a> 

            <ul class="nav justify-content-end" style="font-size: 16px; color: white; font-weight: bold; text-shadow: 2px 2px 4px black;">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#"> Olá, <?php echo $_SESSION['nome'];  ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="logout.php"> Sair </a>
                </li>

            </ul>
        </div>
        </nav>    
    </header>

    <body style="display: flex; flex-direction: column; min-height: 100%; background-image: url('img/champ03.png'); background-position: bottom;  background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
    
    <section class="container text-center text-light" style="margin: auto;">
       
            <div class="row justify-content-md-center mt-3 mb-4">  
                    <div class="bg-dark col m-1 text-dark" style="background-image: url('img/back05.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
                        <label class="titulorel pt-2" style="font-weight: bold; color:white; font-weight: bold; text-shadow: 2px 2px 4px black; font-size: 28px;"> Pontuação por times - Excel </label>
                        <form name="pontuar" action="times_pontuacao_excel.php" method="POST" class="pt-3">

                                <label class="labelform"> Rodada </label>
                                    <select class="parametrosform2" name="id_rodada" style="text-align: center;"> 
                                        <?php
                                            $func_rod = "SELECT r.id_rodada as id_rodada, r.nome_rodada as nome_rodada from rodadas as r;";
                                            $resultado_func_rod = mysqli_query($conexao,$func_rod);
                                            while($row_func_rod = mysqli_fetch_assoc($resultado_func_rod)){ ?>
                                                <option> <?php echo $row_func_rod['id_rodada']; echo " - "; echo $row_func_rod['nome_rodada'];?>
                                                </option> <?php
                                            }
                                            ?>                                         
                                    </select><br><br>

                                    <input class="btn-sm btn-primary mb-3" style="border-radius: 5px; width: 25%; font-size: 18px; font-weight: bold; text-shadow: 1px 2px 1px black; border: none; box-shadow:1px 1px 4px black; "type="submit" name="enviar" value="Baixar">
                        </form>    
                    </div> 

                    <div class="bg-dark col m-1 text-dark" style="background-image: url('img/back05.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
                        <label class="titulorel pt-2" style="font-weight: bold; color:white; font-weight: bold; text-shadow: 2px 2px 4px black; font-size: 28px;"> Detalhar Time </label>
                        <form name="pontuar" action="times_detalhar.php" method="POST" class="pt-3">
                            
                                    <label class="labelform"> Time </label>
                                    <select class="parametrosform2" name="id_time" style="text-align: center;"> 
                                        <?php
                                            $func_time = "SELECT t.id_time as id_time, t.nome as nome from times as t;";
                                            $resultado_func_time = mysqli_query($conexao,$func_time);
                                            while($row_func_time = mysqli_fetch_assoc($resultado_func_time)){ ?>
                                                <option> <?php echo $row_func_time['id_time']; echo " - "; echo $row_func_time['nome'];?>
                                                </option> <?php
                                            }
                                            ?>                                         
                                    </select><br><br>

                                    <label class="labelform"> Rodada </label>
                                    <select class="parametrosform2" name="id_rodada" style="text-align: center;"> 
                                        <?php
                                            $func_rod = "SELECT r.id_rodada as id_rodada, r.nome_rodada as nome_rodada from rodadas as r;";
                                            $resultado_func_rod = mysqli_query($conexao,$func_rod);
                                            while($row_func_rod = mysqli_fetch_assoc($resultado_func_rod)){ ?>
                                                <option> <?php echo $row_func_rod['id_rodada']; echo " - "; echo $row_func_rod['nome_rodada'];?>
                                                </option> <?php
                                            }
                                            ?>                                         
                                    </select><br><br>

                                    <input class="btn-sm btn-primary mb-3" style="border-radius: 5px; width: 25%; font-size: 18px; font-weight: bold; text-shadow: 1px 2px 1px black; border: none; box-shadow:1px 1px 4px black; "type="submit" name="enviar" value="Detalhar">
                        </form>    
                    </div> 
                    <h1 class="pt-3" style="font-size: 30px; color: white; font-weight: bold; text-shadow: 2px 2px 4px black;"> <?php echo $id_rodada ?> </h1>
                </div>

               

    <div class="container">    
    <?php
            

            echo "<table class='sortable table table-bordered table-hover table-dark table-sm table-responsive' style='margin-left: auto;margin-right: auto;text-align: center;'>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>ID Time</th>";
            echo "<th>Time</th>";
            echo "<th>Total</th>";
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
            $cont = 0;

            while ($registro = mysqli_fetch_array($resultado))
            {
                $grupo[] = $registro;
                $cont = $cont + 1;
                $id_time = $registro['id_time'];
                $time = $registro['time'];
                $total = $registro['total'];

                echo "<tr>";
                echo "<td>".$cont."</td>";
                echo "<td>".$id_time."</td>";
                echo "<td>".$time."</td>";
                echo "<td>".$total."</td>";
                echo "</tr>";
            }

            mysqli_close($conexao);
            echo "</table>";
    ?>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

        <script type="text/javascript">
            $("#datacampo,#datacampo2").mask("0000-00-00");
        </script>
</section>
    </body>

    <footer class="text-center text-white bg-dark">
        
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyright © <?php echo date('Y'); ?> Equipe Sistemas Infolink Telecom. Todos os direitos reservados.
        </div>

    </footer>
</html>