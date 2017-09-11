<?php
  session_start();

  require 'init.php';

  require 'check.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>WebRF2 Página Inicial</title>  
  <link rel="stylesheet" href="css/pagina_inicial_style.css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  
</head>

<body>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['user_usuario']; ?><span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="editar_usuario.php?id=<?php echo $_SESSION['user_id'] ?>">Editar Perfil</a></li>
      <li class="divider"></li>
      <li><a href="logout.php">Sair</a></li>
    </ul>
  </div> 
  <div>
    <h1 class="logo__title" data-name="Nova">WebRF2</h1>
  </div>

  <section class="strips">
    <article class="strips__strip">
      <a href="#"> <!--Endereço do servidor de filmes Emby-->
        <div class="strip__content">
          <h1 class="strip__title" data-name="Ipsum">Filmes</h1>
        </div>
      </a>
    </article>

    <article class="strips__strip">
      <a href="#"> <!--Endereço do servidor de email Zimbra-->
        <div class="strip__content">
          <h1 class="strip__title" data-name="Dolor">Webmail</h1>
        </div>
      </a>
    </article>

    <article class="strips__strip">
      <a href="#"> <!--Endereço do servidor de nuvem Owncloud-->
        <div class="strip__content">
          <h1 class="strip__title" data-name="Sit">Nuvem</h1>
        </div>
      </a>
    </article>

  </section>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <!--<script src="js/index.js"></script>-->
</body>
</html>
