<?php
	require 'init.php'
?>

<!DOCTYPE html>
<html>
	<head>
		<link type = "text/css" rel = "stylesheet" href = "style.css"/>
		<title>Cadastro WebRF2</title>
	</head>

	<body>
		<h1>Cadastro WebRF2</h1><br><br>


		<form action = "cadastro_usuario.php" method = "post">
			Usuario: <input type = "text" name = "usuario" size = "50" length = "50"><br>
   			Senha: <input type = "text" name = "senha" size = "40" length = "40"><br>
			<input type = "submit" name = "addSubmit" value = "Enviar">
		</form><br><br>

		

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

				$hash_senha = sha1(md5($senha));

				// insere no banco
				$PDO = db_connect();
				$sql = "INSERT INTO usuarios(usuario, senha) VALUES(:usuario, :senha)";
				$stmt = $PDO->prepare($sql);
				$stmt->bindParam(':usuario', $usuario);
				$stmt->bindParam(':senha', $hash_senha);
				 
				 
				if ($stmt->execute())
				{
				    echo "Hash: ".$hash_senha;
				}
				else
				{
				    echo "Erro ao cadastrar";
				    print_r($stmt->errorInfo());
				}
			}

		?>

	</body>
</html>
