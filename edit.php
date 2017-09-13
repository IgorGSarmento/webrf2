<?php

require_once 'init.php';

	// resgata os valores do formulário
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;

	// validação (bem simples, mais uma vez)
if (empty($usuario) || empty($senha))
{
	echo "Informe usuario e senha";
	exit;
}

$hash_senha = encryptIt($senha);

	// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE usuarios SET usuario = :usuario, senha = :senha WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $hash_senha);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
{
	header('Location: pagina_inicial.php');
}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}