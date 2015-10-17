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
		$localtipo_id = isset($_POST['local_tipo_id']) ? $_POST['local_tipo_id'] : NULL;
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
	}


	if($action == "delete") {
		$local = Local::find($id);
		
		if($local->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		
		$local = Local::find('all', array("conditions" => " descricao = '$descricao' "));

		if( count($local) <= 0 ) {
			if($descricao != NULL) {
				$local = new Local();
				$local->descricao = $descricao;
				$local->local_tipo_id = $localtipo_id;
				
				if($local->save()){
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
		$local = Local::find($id);
		if($local != null) {
			$local->descricao = $descricao;
			$local->local_tipo_id = $localtipo_id;
			
			if($local->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
	}  	
	
	header('Location: '."../views/local/local_lista.php?msg=".$msg."&msg_erro=".$msg_erro."&mes=".$mes);	
	
?>