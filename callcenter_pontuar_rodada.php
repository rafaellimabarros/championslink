<?php
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
            border-radius: 5px;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);  
        }
            .labelform{
            color: white;
            font-size: 18px;
            font-weight: bold; 
            text-shadow: 2px 2px 1px black;
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

    <body style="display: flex; flex-direction: column; min-height: 100%; background-image: url('img/champ03.png'); background-position: bottom;  background-repeat: no-repeat; background-size: cover;">
    
    <section class="container text-center text-light" style="margin: auto;">

         <div class="w-50 row justify-content-md-center mt-3 mb-4" style="transform: translateX(+50%)">  
                    <div class="bg-dark col m-1 text-dark" style="background-image: url('img/back05.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
                        <label class="titulorel pt-2" style="font-weight: bold; color:white; font-weight: bold; text-shadow: 2px 2px 4px black; font-size: 28px;"> Marcar gols </label>
                        <form name="pontuar" action="callcenter_executa_pontuacao_rodada.php" method="POST" class="pt-3">
                        
                                    <label class="labelform"> Jogador </label>
                                    <select class="parametrosform2" name="id_funcionario" style="text-align: center;"> 
                                        <?php
                                            $func_call = "SELECT f.nome as nome_funcionario, f.id_funcionario as id_funcionario from funcionarios as f where f.id_setor = 2 and f.perfil is null AND f.id_status = 1";
                                            $resultado_func_call = mysqli_query($conexao,$func_call);
                                            while($row_func_call = mysqli_fetch_assoc($resultado_func_call)){ ?>
                                                <option> <?php echo $row_func_call['id_funcionario']; echo " - "; echo $row_func_call['nome_funcionario'];?>
                                                </option> <?php
                                            }
                                            ?>                                         
                                    </select><br><br>

                                <label class="labelform"> Rodada </label>
                                <select class="parametrosform2" name="id_rodada" style="text-align: center;"> 
                                        <?php
                                            $func_rod = "SELECT r.id_rodada as id_rodada, r.nome_rodada as nome_rodada from rodadas as r where r.status_rodada = 'ativa';";
                                            $resultado_func_rod = mysqli_query($conexao,$func_rod);
                                            while($row_func_rod = mysqli_fetch_assoc($resultado_func_rod)){ ?>
                                                <option> <?php echo $row_func_rod['id_rodada']; echo " - "; echo $row_func_rod['nome_rodada'];?>
                                                </option> <?php
                                            }
                                            ?>                                         
                                    </select><br><br>

                                <label class="labelform">Ponto 01</label>
                                <select class="parametrosform2" name="pontuacao_01" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option> </select> <br><br>

                                <label class="labelform">Ponto 02</label>
                                <select class="parametrosform2" name="pontuacao_02" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option> </select> <br><br>

                                <label class="labelform">Ponto 03</label>
                                <select class="parametrosform2" name="pontuacao_03" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform">Ponto 04</label>
                                <select class="parametrosform2" name="pontuacao_04" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>

                                <label class="labelform">Ponto 05</label>
                                <select class="parametrosform2" name="pontuacao_05" style="text-align: center; width: 100px;"> <option>-1</option> <option selected>0</option> <option>1</option> <option>2</option></select> <br><br>
                            

                                <input class="btn-sm btn-primary mb-3" style="border-radius: 5px; width: 25%; font-size: 18px; font-weight: bold; text-shadow: 1px 2px 1px black; border: none; box-shadow:1px 1px 4px black; "type="submit" name="enviar" value="Marcar">
                        </form>    
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