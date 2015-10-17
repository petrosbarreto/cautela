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
		$itemtipo = ItemTipo::find($id);
		
		if($itemtipo->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		
		$itemtipo = ItemTipo::find('all', array("conditions" => " descricao = '$descricao' "));

		if( count($itemtipo) <= 0 ) {
			if($descricao != NULL) {
				$itemtipo = new ItemTipo();
				$itemtipo->descricao = $descricao;
				
				if($itemtipo->save()){
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
	} 	
	
	header('Location: '."../views/item_tipo/item_tipo_lista.php?msg=".$msg."&msg_erro=".$msg_erro."&mes=".$mes);	
	
?>