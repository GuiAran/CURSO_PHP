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
<form action='' method="post">
	Nome: <input type="text" name="nome"> <br><br>
	E-mail: <input type="text" name="email"> <br><br>
	Senha: <input type="password" name="senha"> <br><br>
	<input type="submit" value="GRAVAR">
  <?php echo '<a href="index.php"> VOLTAR </a>'; ?>
</form>

<?php

if($_POST){
	if(inserir('usuarios', $_POST)){
		header('location:index.php');
	}

}



?>

</body>
</html>
