<?php
include('verifica_login.php');

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
            border-radius:10px;
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
             <h1 class="pb-4"style="font-size: 30px; color: white; padding: 20px; font-weight: bold; text-shadow: 2px 2px 4px black;"> Rodadas - NOC </h1>
         </div> 

                    <?php
                        if(isset($_SESSION['ponto_sucesso'])):
                    ?>
                    <div class="alert alert-success w-50" role="alert" style="transform: translateX(+50%)">
                            <?php echo $_SESSION['funcionario_pontuado'];  ?> foi pontuado com sucesso!
                    </div>
                    <?php    
                        endif;
                        unset($_SESSION['ponto_sucesso']);
                    ?>

                    <?php
                        if(isset($_SESSION['ponto_nao_sucesso'])):
                    ?>
                    <div class="alert alert-danger w-50" role="alert" style="transform: translateX(+50%)">
                            <?php echo $_SESSION['funcionario_pontuado'];?> não foi pontuado, pois ja teve pontuação hoje.
                    </div>
                    <?php    
                        endif;
                        unset($_SESSION['ponto_nao_sucesso']);
                    ?>


         <table class='sortable table table-bordered table-hover table-dark table-sm table-responsive' style='margin-left: auto;margin-right: auto;text-align: center;'>
         <thead>   
         <tr>
            <th>Rodada</th>
            <th>Acessar</th>
            </tr>
            </thead>

            <tbody>
            <tr>
            <td>Rodada 01</td>
            <td> <a href="NOC_rodada01.php"> <button type="button" class="btn btn-primary">Acessar</button> </a> </td>
            </tr>

            <tr>
            <td>Rodada 02</td>
            <td> <a href="NOC_rodada02.php"> <button type="button" class="btn btn-primary">Acessar</button> </a> </td>
            </tr>
            </tbody>
            </table>


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