<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>WebRF2 Login</title>  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/pagina_login_style.css" type="text/css">  
</head>

<body>
  <div class="wrapper">
    <form action="login.php" method="post" class="form-signin">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="usuario" placeholder="Usu&aacute;rio" required="" autofocus="" />
      <input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
