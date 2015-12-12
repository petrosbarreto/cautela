<?php 
	require_once "../includes/database.config.php";

	session_start();
	
	if(isset($_SESSION['idusuario'])) {
		$usuarioid = $_SESSION['idusuario'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action    = $_POST['action'];
		$id 	   = isset($_POST['id']) ? $_POST['id'] : NULL;
		$nome	   = isset($_POST['nome']) ? $_POST['nome'] : NULL;
		$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : NULL;
		$qtd_total = isset($_POST['qtd_total']) ? $_POST['qtd_total'] : NULL;
		$item_tipo_id = isset($_POST['item_tipo_id']) ? $_POST['item_tipo_id'] : NULL;
		$patrimonio = isset($_POST['patrimonio']) ? $_POST['patrimonio'] : NULL;
		$permanente = isset($_POST['permanente']) ? $_POST['permanente'] : 0;
	} else {
		$action    = $_GET['action'];
		$id 	   = $_GET['id'];
	}
	
		$query = "";
	if($action == "index") {
		if($patrimonio != NULL) {
			$query .= "&patrimonio=$patrimonio";
		}
		if($nome != NULL && strlen($nome) >= 4){
			$query .= "&nome=$nome";
		}
		if($item_tipo_id != NULL) {
			$query .= "&tipo=$item_tipo_id";
		}
	} elseif($action == "delete") {
		$item = Item::find($id);
		
		if($item->delete()) {
			$msg = "Objeto excluido com sucesso!";
		} else {
			$msg_erro = "Nao foi possivel excluir objeto!";
		}
	} elseif($action == "new") {
		if($descricao != NULL) {
			$item = new Item();
			$item->nome = $nome;
			$item->descricao = $descricao;
			$item->qtd_total = $qtd_total;
			$item->item_tipo_id = $item_tipo_id;
			$item->patrimonio = $patrimonio;
			$item->permanente = $permanente;
			
			if($item->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		} else {
			$msg_erro = "Descriзгo й obrigatуria!";
		}
	} elseif($action == "update") {
		$item = Item::find($id);
		if($item != null) {
			$item->nome = $nome;
			$item->descricao = $descricao;
			$item->qtd_total = $qtd_total;
			$item->item_tipo_id = $item_tipo_id;
			$patrimonio->patrimonio = $patrimonio;
			$permanente->permanente = $permanente;
			
			if($item->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		}
	}  	
	
	header('Location: '."../views/item/item_lista.php?msg=$msg&msg_erro=$msg_erro&mes=$mes$query");	
	
?>