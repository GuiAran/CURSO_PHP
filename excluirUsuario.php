<?php
require 'checkLogin.php';
require 'config.php';

if (!isset($_GET['id'])){
	header('location:index.php');
	exit();
}

$id = $_GET['id'];

if(excluir('usuarios', "id=$id")){
	header('location:index.php');
}