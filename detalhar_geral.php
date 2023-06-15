<?php
session_cache_limiter('private_no_expire');
include('verifica_login.php');
include('conexao.php');

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

         <div class="container">
             <h1 class="pb-4"style="font-size: 30px; color: white; padding: 20px; font-weight: bold; text-shadow: 2px 2px 4px black;"> Gols do jogador </h1>           
            </div> 

            <?php
                if ($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'auditor'): ?>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal_editar"> Editar gols </button>
            <?php endif; ?>

    <div class="container">    
    <?php
            $id_funcionario  =  $_POST['id_funcionario'];
            $id_rodada = $_POST['id_rodada'];

            echo "<table class='sortable table table-bordered table-hover table-dark table-sm table-responsive' style='margin-left: auto;margin-right: auto;text-align: center;'>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>ID Gol</th>";
            echo "<th>Data do Gol</th>";
            echo "<th>Marcador</th>";
            echo "<th>Jogador</th>";
            echo "<th>ponto_01</th>";
            echo "<th>ponto_02</th>";
            echo "<th>ponto_03</th>";
            echo "<th>ponto_04</th>";
            echo "<th>ponto_05</th>";
            echo "<th>total</th>";
            echo "</tr>";

            $sql = "SELECT
            ptr01.id_pontos_rodada_01 AS id_pontos,
            ptr01.data as data_pontuacao,
            ptr01.usuario_pontuador as pontuador,
            (select f.nome from funcionarios as f where f.id_funcionario = ptr01.id_funcionario) as nome,
            ptr01.ponto_01 as ponto_01,
            ptr01.ponto_02 as ponto_02,
            ptr01.ponto_03 as ponto_03,
            ptr01.ponto_04 as ponto_04,
            ptr01.ponto_05 as ponto_05,
            SUM(ptr01.ponto_01+ptr01.ponto_02+ptr01.ponto_03+ptr01.ponto_04+ptr01.ponto_05) AS total 
            
            from pontos_rodada_01 as ptr01
            
            where ptr01.id_funcionario = '$id_funcionario' and ptr01.id_rodada = '$id_rodada'
            GROUP by ptr01.id_pontos_rodada_01;";

            $resultado = mysqli_query($conexao,$sql);
            $cont = 0;

            while ($registro = mysqli_fetch_array($resultado))
            {
                $grupo[] = $registro;
                $cont = $cont + 1;
                $id_pontos = $registro['id_pontos'];
                $data_pontuacao = $registro['data_pontuacao'];
                $pontuador = $registro['pontuador'];
                $nome = $registro['nome'];
                $ponto_01 = $registro['ponto_01'];
                $ponto_02 = $registro['ponto_02'];
                $ponto_03 = $registro['ponto_03'];
                $ponto_04 = $registro['ponto_04'];
                $ponto_05 = $registro['ponto_05'];
                $total = $registro['total'];

                echo "<tr>";
                echo "<td>".$cont."</td>";
                echo "<td>".$id_pontos."</td>";
                echo "<td>".$data_pontuacao."</td>";
                echo "<td>".$pontuador."</td>";
                echo "<td>".$nome."</td>";
                echo "<td>".$ponto_01."</td>";
                echo "<td>".$ponto_02."</td>";
                echo "<td>".$ponto_03."</td>";
                echo "<td>".$ponto_04."</td>";
                echo "<td>".$ponto_05."</td>";
                echo "<td>".$total."</td>";
                echo "</tr>";
            }

            mysqli_close($conexao);
            echo "</table>";
    ?>
    </div>

    <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Editar</h5>   
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </div>
                
                <div class="row justify-content-md-center mt-3 mb-4" style="transform: translateX(+9%); width: 90%;">  
                <div class="bg-dark col m-1 text-dark" style="background-image: url('img/back05.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
                        <label class="titulorel pt-2" style="font-weight: bold; color:white; font-weight: bold; text-shadow: 2px 2px 4px black; font-size: 28px;"> Editar gols</label>
                        <form name="pontuar" action="editar_pontuacao_executa.php" method="POST" class="pt-3">
                        
                                <label class="labelform"> ID do gol </label>
                                <input class="parametrosform2" type="text" name="id_pontuacao" size="5" style="text-align: center;" required><br><br>   

                                <label class="labelform">Ponto 01</label>
                                <select class="parametrosform2" name="pontuacao_01" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform">Ponto 02</label>
                                <select class="parametrosform2" name="pontuacao_02" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option> </select> <br><br>

                                <label class="labelform">Ponto 03</label>
                                <select class="parametrosform2" name="pontuacao_03" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform">Ponto 04</label>
                                <select class="parametrosform2" name="pontuacao_04" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform">Ponto 05</label>
                                <select class="parametrosform2" name="pontuacao_05" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform"> Observação </label><br>
                                <textarea class="parametrosform2" name="observacao" required rows="5" cols="40" required ></textarea><br><br>

                                <input class="btn-sm btn-primary mb-3" style="border-radius: 5px; width: 25%; font-size: 18px; font-weight: bold; text-shadow: 1px 2px 1px black; border: none; box-shadow:1px 1px 4px black; "type="submit" name="enviar" value="Editar">
                        </form>    
                    </div>
                </div>
            </div>
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