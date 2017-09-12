<?php
session_start();

require 'init.php';

require 'check.php';

    // pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

    // valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

    // busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT usuario, senha FROM usuarios WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

    // se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/pagina_login_style.css" type="text/css">    
    <title>Edição de Usuário</title>
</head>

<body style="text-align: center">
    <h1>Editar Usuário</h1>
    <!--<form action="edit.php" method="post">
        <label for="usuario">Usuário: </label>
        <br>
        <input type="text" name="usuario" id="usuario" value="<?php// echo $user['usuario'] ?>">
        
        <br><br>
        
        <label for="senha">Senha: </label>
        <br>
        <input type="password" name="senha" id="senha">
        
        
        
        <input type="hidden" name="id" value="<?php// echo $id ?>">
        <br>
        <input type="submit" value="Alterar">
    </form>-->

    <div class="wrapper">
        <form action="login.php" method="post" class="form-signin" style="height: 325px">
            <input type="text" class="form-control" name="usuario" value="<?php echo $user['usuario']?>" required="" autofocus="" />
            <input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
            <br>
            <a href="index.php" style="text-decoration-line: none"><button class="btn btn-lg btn-primary btn-block">Voltar</button></a>
        </form>
        
    </div>
</body>
</html>