<?php
require 'autoload.php';
$sql = new Dados();

if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = addslashes($_POST['email']);

	if ($sql->setEmail($email)) {
		echo '<script>alert("Registrado com sucesso!");</script>';
		echo '<script>window.location.href="index.php";</script>';
	} else {
		echo '<script>alert("Ultrapassou o limite de registros!");</script>';
		echo '<script>window.location.href="index.php";</script>';
	}
}
?>