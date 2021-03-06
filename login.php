<?php

	// inclui o arquivo de inicialização
	require 'init.php';

	// resgata variáveis do formulário
	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

	if (empty($usuario) || empty($senha))
	{
		echo "Informe usuario e senha";
		exit;
	}

	$PDO = db_connect();

	$sql = "SELECT id, usuario FROM usuarios WHERE usuario = :usuario AND senha = :senha";
	$stmt = $PDO->prepare($sql);

	$hash_senha = encryptIt($senha);

	$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
	$stmt->bindParam(':senha', $hash_senha, PDO::PARAM_STR);

	$stmt->execute();

	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($users) <= 0)
	{
		echo "usuario ou senha incorretos";
		exit;
	}

			// pega o primeiro usuário
	$user = $users[0];

	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['user_usuario'] = $user['usuario'];

	header('Location: pagina_inicial.php');