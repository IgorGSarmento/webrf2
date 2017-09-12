<?php
require 'init.php'
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
	<link rel="stylesheet" href="css/pagina_login_style.css" type="text/css">
	<title>Cadastro WebRF2</title>
</head>

<body style="text-align: center">
	<h1>Cadastro WebRF2</h1>

	<div class="wrapper">
		<form action="login.php" method="post" class="form-signin" style="height: 325px">
			<input type="text" class="form-control" name="usuario" placeholder="Usu&aacute;rio" required="" autofocus="" />
			<input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastro</button>
			<br>
            <a href="index.php" style="text-decoration-line: none"><button class="btn btn-lg btn-primary btn-block">Voltar</button></a>
		</form>
	</div>


	<!--<form action = "cadastro_usuario.php" method = "post">
		Usuario: <input type = "text" name = "usuario" size = "50" length = "50"><br>
		Senha: <input type = "password" name = "senha" size = "40" length = "40"><br>
		<input type = "submit" name = "addSubmit" value = "Enviar">
	</form><br><br>-->


	<?php
	if(!empty($_POST['addSubmit'])) {
		$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
		$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

					// validação (bem simples, só pra evitar dados vazios)
		if (empty($usuario) || empty($senha))
		{
			echo "Volte e preencha todos os campos";
			exit;
		}

		$hash_senha = encryptIt($senha);

					// insere no banco
		$PDO = db_connect();
		$sql = "INSERT INTO usuarios(usuario, senha) VALUES(:usuario, :senha)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':usuario', $usuario);
		$stmt->bindParam(':senha', $hash_senha);


		if ($stmt->execute())
		{
			echo "Usuário cadastrado com sucesso!";
		}
		else
		{
			echo "Erro ao cadastrar!";
			print_r($stmt->errorInfo());
		}
	}
	?>

</body>
</html>
