<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<form action='' method="post">
	E-mail: <input type="text" name="email"> <br><br>
	Senha: <input type="password" name="senha"> <br><br>
	<input type="submit" value="Entrar">
  <?php echo '<a href="index.php"> VOLTAR </a>'; ?>
</form>

<?php
require 'conexao.php';
if($_POST){
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
	
	$result = pg_query($query);
	
	$usuario = pg_fetch_assoc($result);
	
	if($usuario){
		session_start();
		$_SESSION['logado'] = true;
		$_SESSION['usuario'] = $usuario['nome'];
		header('location:index.php');
	}else{
		echo "<h2> Usuario ou senha incorretos!</h2>" ;
	}
}



?>

</body>
</html>