<?php 
	require_once "database.config.php";
	
	$BASE = "/cautela/";
    
	if(session_id() == '' || !isset($_SESSION)) {		
		session_start();
	}
 
	#verifica se usuario esta logado
	if(!isset($_SESSION['idusuario'])) {
		header("Location: ".$BASE."logout.php");	
	}

?>
<!DOCTYPE html>
<html>
<head>
	
<?php
	echo "<script src='".$BASE."js/jquery-1.11.1.min.js'></script>";
	echo "<script src='".$BASE."js/bootstrap.min.js'></script>";
	echo "<script src='".$BASE."js/bootstrap-datepicker.js'></script>";
	echo "<link rel='stylesheet' type='text/css' href='".$BASE."css/bootstrap.min.css'></link>";
	echo "<link rel='stylesheet' type='text/css' href='".$BASE."css/datepicker.css'></link>";
	echo "<link rel='stylesheet' type='text/css' href='".$BASE."css/bootstrap-responsive.css'></link>";
	echo "<link rel='stylesheet' type='text/css' href='".$BASE."css/starter-template.css'></link>";
?>
<style type="text/css">
	.green{color:green;}
	.red{color:red;}
</style>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $BASE ?>">Cautela</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro Básico <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $BASE ?>views/item_tipo/item_tipo_lista.php">Tipo de Item</a></li>
            <li><a href="<?php echo $BASE ?>views/local/local_lista.php">Local</a></li>
            <li><a href="<?php echo $BASE ?>views/local_tipo/local_tipo_lista.php">Tipo Local</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Controle Material<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $BASE ?>views/item/item_lista.php">Controle Item</a></li>
            <li><a href="<?php echo $BASE ?>views/item_local/item_local_lista.php">Controle Armazenagem</a></li>
          </ul>
        </li>
        <li><a href="<?php echo $BASE ?>logout.php">Logout (<?php echo $_SESSION['nomeusuario'] ?>)</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<div class="container">
  