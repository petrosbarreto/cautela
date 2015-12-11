<?php 
	require_once "../includes/database.config.php";

	session_start();
	
	if(isset($_SESSION['idusuario'])) {
		$usuarioid = $_SESSION['idusuario'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$action		= $_POST['action'];
		$item_id 	= isset($_POST['item_id']) ? $_POST['item_id'] : NULL;
		$local_id	= isset($_POST['local_id']) ? $_POST['local_id'] : NULL;
		$qtd		= isset($_POST['qtd']) ? $_POST['qtd'] : NULL;
		$patrimonio = isset($_POST['patrimonio']) ? $_POST['patrimonio'] : NULL;
		$nome		= isset($_POST['nome']) ? $_POST['nome'] : NULL;
		$item_tipo_id = isset($_POST['item_tipo_id']) ? $_POST['item_tipo_id'] : NULL;
	} else {
		$action    = $_GET['action'];
		$item_id 	= isset($_GET['item_id']) ? $_GET['item_id'] : NULL;
		$local_id	= isset($_GET['local_id']) ? $_GET['local_id'] : NULL;
	}
	
		$query = "";
	if($action == "index") {
		if($patrimonio != NULL) {
			$query .= "&patrimonio=$patrimonio";
		}
		if($nome != NULL && strlen($nome) >= 4){
			$query .= "&nome=$nome";
		}
		if($local_id != NULL) {
			$query .= "&local_id=$local_id";
		}
		if($item_tipo_id != NULL) {
			$query .= "&tipo=$item_tipo_id";
		}
	} elseif($action == "delete") {
		if($item_id != null && $local_id != null) {
			$itemlocal = ItemLocal::first(array('conditions' => "item_id = $item_id and local_id = $local_id"));
			
			if($itemlocal->delete()) {
				$msg = "Objeto excluido com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel excluir objeto!";
			}
		} else {
			$msg_erro = "Valores obrigatórios não informados!";
		}
	} elseif($action == "new") {
				
		$error = validate_new($qtd, $item_id, $local_id);
		if($error == 'OK') {
			$itemlocal = new ItemLocal();
			$itemlocal->qtd = $qtd;
			$itemlocal->item_id = $item_id;
			$itemlocal->local_id = $local_id;
			
			if($itemlocal->save()){
				$msg = "Objeto salvo com sucesso!";
			} else {
				$msg_erro = "Nao foi possivel salvar objeto!";
			}
		} else {
			$msg_erro = $error;
		}
	} elseif($action == "update") {
		
	}  	
	if($action == 'index') {
		header('Location: '."../views/item_local/item_local_lista.php?msg=$msg&msg_erro=$msg_erro&mes=$mes$query");
	} else {
		header('Location: '."../views/item_local/item_local_form.php?id=$item_id&msg=$msg&msg_erro=$msg_erro&mes=$mes$query");	
	}
	
	function validate_new($qtd, $item_id, $local_id) {
		
		#validar quantidade informada
		if($qtd <= 0) {
			return "Quantidade tem que ser maior que zero!";
		}
		$itemlocal = ItemLocal::first(array('conditions' => "item_id = $item_id and local_id = $local_id"));
		if($itemlocal != null) {
			return "Item já armazenado com outra quantidade, apague primeiro e depois insirar a nova quantidade!";
		}
		
		$item = Item::find($item_id);
		$qtd_nao_armazenada = ($item->qtd_total - ItemLocal::qtd_itens_armazenados($item->id));
		
		if($qtd_nao_armazenada < $qtd) {
			return "Quantidade informada maior que a quantidade a ser armazenada!";
		}

		#validar outros itens obrigatorios
		if($item_id == null || $local_id == null) {
			return "Valores obrigatórios ausentes!";
		}
		return 'OK';
	}
	
	
?>