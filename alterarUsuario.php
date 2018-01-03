<?php 
require 'checkLogin.php';
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de Usuarios</title>
</head>
<body>
<?php 
	if(!isset($_GET['id']) ){
		header('location;index.php');
		exit();
	}
	
	$id = $_GET['id'];
	
	$registro = buscaRegistro('usuarios', "id=$id" );
	
	if(!$registro){
		header('location:index.php');
		exit();
	}

?>

<form action='' method="post">
	Nome: <input type="text" name="nome" value="<?= $registro['nome'] ?>"> <br><br>
	E-mail: <input type="text" name="email" value="<?= $registro['email'] ?>"> <br><br>
	Senha: <input type="password" name="senha"> <label>Senha atual: <?= $registro['senha'] ?></label> <br><br>
	<input type="submit" value="GRAVAR">
  <?php echo '<a href="index.php"> VOLTAR </a>'; ?>
</form>

<?php
require 'conexao.php';
if($_POST){
	if(alterar('usuarios', $_POST, "id=$id")){
		header('location:index.php');
	}

}



?>

</body>
</html>
