<?php
session_start();
?>

<!DOCTYPE html>
<html style = 'overflow-y:hidden'>
    
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/champicone.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ChampionsLink </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bulma.min.css" />
    <style>
        -webkit-text-stroke-width: 2px; /* largura da borda */
        -webkit-text-stroke-color: white; /* cor da borda */
    </style>
</head>

<body>
    <section class="hero is-fullheight">
        <div class="hero-body" style="background-image: url('img/champ03.png'); background-position: center;  background-repeat: no-repeat; background-size: cover;">
            <div class="container has-text-centered">
                <div class="column is-5" style="transform: translateX(+70%)">
                <img src="img/champicone.png" style=" widtch: 200px; height: 200px;">
                    <h3 style="font-size: 55px; color: darkblue; padding: 10px; font-weight: bold; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: white; text-shadow: 1px 1px 1px white;"> Champions Link </h3>
                    <!--  -->
                    <?php
                        if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php    
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>

                    <?php
                        if(isset($_SESSION['senha_sucesso'])):
                    ?>
                    <div class="notification is-success">
                      <p>Senha alterada com sucesso!</p>
                    </div>
                    <?php    
                        endif;
                        unset($_SESSION['senha_sucesso']);
                    ?>

                    <div class="box has-background-light">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large is-link" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large is-link" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-link is-medium is-fullwidth ">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>