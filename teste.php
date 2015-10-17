<?php
	
	require "includes/database.config.php";
	
	
	$usuario = Usuario::find(1);

	var_dump($usuario->errors);

?>