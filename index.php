<?php
session_start();
 
require 'init.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>WebRF2 Login</title>
    </head>
 
    <body>
         
        <h1 style="text-align: center;">WebRF2 Login</h1>
 
        <?php 
            if (isLoggedIn()){
                header("Location: pagina_inicial.php");
            }else{
                include 'pagina_login.php';
            }

        ?>
 
    </body>
</html>