<?php
define('HOST', 'localhost');
define('USUARIO','root');
define('SENHA','');
define('BD','championsbd');

$conexao = mysqli_connect(HOST,USUARIO,SENHA,BD) or die ('não foi possível conectar');

?>