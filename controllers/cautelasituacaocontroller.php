<?php 
	require_once "../includes/database.config.php";

	session_start();
	
	if(isset($_SESSION['idusuario'])) {
		$usuarioid = $_SESSION['idusuario'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = isset($_POST['id']) ? $_POST['id'] : NULL;
		$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : NULL ;
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
	}

	if($action == "delete") {
		$cautelasituacao = CautelaSituacao::find($id);
		
		if($cautelasituacao->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		
		$cautelasituacao = CautelaSituacao::find('all', array("conditions" => " descricao = '$descricao' "));

		if( count($cautelasituacao) <= 0 ) {
			if($descricao != NULL) {
				$cautelasituacao = new CautelaSituacao();
				$cautelasituacao->descricao = $descricao;
				$cautelasituacao->usuario_id = $usuarioid;
				
				if($cautelasituacao->save()){
					$msg = "Objeto salvo com sucesso!";
				} else {
					$msg_erro = "Nao foi possivel salvar objeto!";
				}
			} else {
				$msg_erro = "Descrição é obrigatória!";
			}
		} else {
			$msg_erro = "Item já foi inserido!";	
		}
	} elseif($action == "update") {
		$cautelasituacao = CautelaSituacao::find($id);
		if($cautelasituacao != null) {
			$cautelasituacao->descricao = $descricao;
			$cautelasituacao->usuario_id = $usuarioid;
			$cautelasituacao->updated_at = date('Y-m-d H:i:s');
			
			if($cautelasituacao->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
	}  	
	
	header('Location: '."../views/cautela_situacao/cautela_situacao_lista.php?msg=".$msg."&msg_erro=".$msg_erro."&mes=".$mes);	
	
?>