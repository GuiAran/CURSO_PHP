<?php
require 'checkLogin.php';
require 'config.php';


$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

$registros = listar('usuarios'); 

echo '<hr>';
echo '<h2> Voce esta logado(a) como: '. $usuario . ' | <a href="sair.php"> SAIR </a> </h2>';
echo '<a href="cadastrarUsuario.php"> +Novo usuario </a>';
echo '<br>';
echo '<br>';
echo '<hr>';
foreach ($registros as $registro){
	echo "Usuario: $registro[nome] <br>";
	echo "Email: $registro[email] <br>";
	echo "Senha: ******* <br>";
	echo "<br>";
	echo '<a href="alterarUsuario.php?id='.$registro['id'].'"> Alterar </a> |
		  <a href="excluirUsuario.php?id='.$registro['id'].'"> Excluir </a>';
	echo '<hr>';
}