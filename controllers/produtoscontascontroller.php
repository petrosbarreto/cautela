<?php 
	require_once "../includes/database.config.php";

	session_start(false);

	$msg = "";
	$msg_erro = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = $_POST['id'];
		$descricao = $_POST['descricao'];
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
		$descricao = $_GET['descricao'];
	}

	

	if($action == "delete") {
		$produtos_conta = ProdutosConta::find($id);
		if($produtos_conta->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		$produtos_conta = new ProdutosConta();
		$produtos_conta->descricao = $descricao;
		if($produtos_conta->save()){
			$msg = "Objeto salvo com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel salvar objeto!";
			foreach ($produtos_conta->errors as $erro) {
				$msg_erro .= "<br/> ".$erro;
			}
		}
		error_log( print_R($produtos_conta->errors,TRUE) );
		
	} elseif($action == "update") {
		$produtos_conta = ProdutosConta::find($id);
		if($produtos_conta != null) {
			$produtos_conta->descricao = $descricao;
			if($produtos_conta->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
		
	} 
	
	header('Location: '."../views/produtos_contas/produtos_contas_lista.php?msg=".$msg."&msg_erro=".$msg_erro);	
	
?>