<?php 
	require_once "../includes/database.config.php";

	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = $_POST['id'];
		$descricao = $_POST['descricao'];
		$produto_tipo_id = $_POST['produto_tipo_id'];
		$produto_conta_id = $_POST['produto_conta_id'];
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
		$descricao = $_GET['descricao'];
		$produto_tipo_id = $_GET['produto_tipo_id'];
		$produto_conta_id = $_GET['produto_conta_id'];
	}

	

	if($action == "delete") {
		$produto = Produto::find($id);
		if($produto->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		$produto = new Produto();
		$produto->descricao = $descricao;
		$produto->produto_tipo_id = $produto_tipo_id;
		$produto->produto_conta_id = $produto_conta_id;
		if($produto->save()){
			$msg = "Objeto salvo com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel salvar objeto!";
		}
	} elseif($action == "update") {
		$produto = Produto::find($id);
		if($produto != null) {
			$produto->descricao = $descricao;
			$produto->produto_tipo_id = $produto_tipo_id;
			if($produto->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
		
	} 
	
	header('Location: '."../views/produtos/produtos_lista.php");	
	
?>