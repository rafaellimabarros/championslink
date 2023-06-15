<?php
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br" style="height: 100%; min-height: 100%; overflow-y:hidden;">

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icone.ico" />
        <link rel="stylesheet" type="text/css" href="estilos.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title> Champions Link </title>
        <link rel="stylesheet" href="bulma.min.css" />
    </head>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand fs-4 text-center" href="championslink.php">
                    <img src="img/logo_infolink_crop.png" alt="" width="35" height="35" class="d-inline-block align-text-top rounded">
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

    <body style="display: flex; flex-direction: column; min-height: 100%; background-image: url('img/campo01.jpg'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
        <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                
                <h3 style="font-size: 30px; color: white; padding: 10px; font-weight: bold; text-shadow: 2px 2px 4px black;"> Mudar senha </h3>

                    <?php
                            if(isset($_SESSION['senha_antiga_nao_confere'])):
                        ?>
                        <div class="notification is-danger">
                        <p>Senha antiga não confere, tente novamente.</p>
                        </div>
                        <?php    
                            endif;
                            unset($_SESSION['senha_antiga_nao_confere']);
                    ?>

                    <?php
                            if(isset($_SESSION['nova_senha_nao_igual'])):
                        ?>
                        <div class="notification is-danger">
                        <p>As novas senhas não estão iguais, tente novamente</p>
                        </div>
                        <?php    
                            endif;
                            unset($_SESSION['nova_senha_nao_igual']);
                    ?>

                    <?php
                            if(isset($_SESSION['senha_menor'])):
                        ?>
                        <div class="notification is-danger">
                        <p> Senha deve ser maior que 8 caracteres </p>
                        </div>
                        <?php    
                            endif;
                            unset($_SESSION['senha_menor']);
                    ?>

               <div class="box">
                    <form action="muda_senha.php" method="POST">
                                <div class="field">
                                    <div class="control">
                                        <input name="antigasenha" type="password" class="input is-large" placeholder="Senha Anterior" autofocus="">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input name="novasenha" type="password" class="input is-large" placeholder="Nova Senha">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input name="novasenha2" type="password" class="input is-large" placeholder="Confirme a nova senha">
                                    </div>
                                </div>

                                <button type="submit" class="button is-success is-rounded is-medium is-fullwidth">Confirmar</button>
                    </form>
                        </div>                
        </section>

     </body>

    <footer class="text-center text-white bg-dark" style="margin-top: auto;">
        
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyright © <?php echo date('Y'); ?> Equipe Sistemas Infolink Telecom. Todos os direitos reservados.
        </div>

    </footer>
</html>