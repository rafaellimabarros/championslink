<?php
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br" style="height: 100%; min-height: 100%;">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/champicone.ico" />
        <link rel="stylesheet" type="text/css" href="estilos.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title> Champions Link </title>
        <style type="text/css">
            .destaque1{
            background-image: url('img/callcenter_icone.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 15px;           
            padding-right: 10px;
            margin-right: 5px;
            max-width: 350px;
            margin: 0 auto;
            }
            .destaque2{
            background-image: url('img/noc_icone03.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 15px;         
            padding-right: 10px;
            margin-right: 5px;
            max-width: 350px;
            margin: 0 auto;
            }
            .destaque3{
            background-image: url('img/times_icone.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 15px;        
            padding-right: 10px;
            margin-right: 5px;
            max-width: 350px;
            margin: 0 auto;
            }
            .links2{
            text-decoration: none;
            color: rgba(255, 255, 255, 0.952);
            font-size: 30px;
            font-weight: bold; 
            text-shadow: 3px 3px 1px black;
            }

            .links2:hover{
                color: white;
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
                    <a class="nav-link active text-light" aria-current="page" href="pagina_senha.php"> Mudar Senha </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="logout.php"> Sair </a>
                </li>

            </ul>
        </div>
        </nav>    
    </header>

    <body style="display: flex; flex-direction: column; min-height: 100%; background-image: url('img/champ03.png'); background-position: bottom;  background-repeat: no-repeat; background-size: cover;">
       
    <section class="container-fluid text-center text-light" style="margin: auto;">
        <div class="container"> 
            <h1 class="pb-5" style="font-size: 30px; color: white; padding: 10px; font-weight: bold; text-shadow: 2px 2px 4px black;">Bem vindo!</h1>
        
                    <?php
                        if(isset($_SESSION['editado_sucesso'])):
                    ?>
                    <div class="alert alert-success w-50" role="alert" style="transform: translateX(+50%)">
                             Pontuação editada com sucesso!
                    </div>
                    <?php    
                        endif;
                        unset($_SESSION['editado_sucesso']);
                    ?>

            <div class="row align-items-center mt-3 mb-4" style="flex-direction: row;justify-content: center;align-items: center;">

                <?php if ($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'auditor' || $_SESSION['perfil'] == 'gestor_callcenter' ): ?>
                    <div class="col align-self-center m-1 text-light">
                        <div class="destaque1">
                            <label class="vitrine"> </label>
                            <a class="links2" href="callcenter_rodadas_new.php" style="-webkit-text-stroke-width: 1.2px;-webkit-text-stroke-color: black;"> Callcenter </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'auditor' || $_SESSION['perfil'] == 'gestor_noc'): ?>
                    <div class="col m-1 text-light">
                        <div class="destaque2">
                            <label class="vitrine"> </label>
                            <a class="links2 "href="NOC_rodadas_new.php" style="-webkit-text-stroke-width: 1.2px;-webkit-text-stroke-color: black;"> NOC </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'marketing'): ?>
                    <div class="col m-1 text-light">
                        <div class="destaque3">
                            <label class="vitrine"> </label>
                            <a class="links2 "href="times.php" style="-webkit-text-stroke-width: 1.2px;-webkit-text-stroke-color: black;"> Times </a>
                        </div>
                    </div>
                    <?php endif; ?>
                              
            </div>
         </div>
         <br>
        </section>
    </body>

    <footer class="text-center text-white bg-dark">
        
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyright © <?php echo date('Y'); ?> Equipe Sistemas Infolink Telecom. Todos os direitos reservados.
        </div>
        
    </footer>
</html>