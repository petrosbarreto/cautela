<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>

<?php 
	$item = Item::find($_GET['id']); 
	$qtd_nao_armazenada = ($item->qtd_total - ItemLocal::qtd_itens_armazenados($item->id));
?>

<div class="panel panel-default">
  <div class="panel-heading">Item Local</div>
  <div class="panel-body">
	<table class="table">
		<thead>
		<tr>
			<th>Cód</th>
			<th>Nome</th>
			<th>Patrimônio</th>
			<th>Qtd. Total</th>
			<th>Qtd. Não Armazenada</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><?php echo $item->id ?></td>
			<td><?php echo $item->nome ?></td>
			<td><?php echo $item->patrimonio != null ? $item->patrimonio : "-" ?></td>
			<td><?php echo $item->qtd_total ?></td>
			<td><?php echo $qtd_nao_armazenada ?></td>
		</tr>
		</tbody>
	</table>
	<div class="panel panel-default">
	<div class="panel-heading">Designar Local</div>
	<div class="panel-body">
		<form role="form" class="form-inline" action="../../controllers/itemlocalcontroller.php" method="post">
	    	<input type="hidden" id="action" name="action" value="new"/>
	    	<input type="hidden" id="item_id" name="item_id" value="<?php echo $item->id ?>"/>
	    	<div class="form-group">
	    		<label for="qtd">Qtd. :</label>
	    		<input type="text" class="form-control" size="4" id="qtd" name="qtd" required="true" value="<?php echo $qtd_nao_armazenada ?>">
	    	</div>
	    	<div class="form-group">
	  			<label for="local_id">Local:</label>
	  			<select required="true" id="local_id" name="local_id" class="form-control">
		          <?php foreach (Local::find('all', array('order' => 'descricao asc')) as $local) { ?>
		          	<option value="<?php echo $local->id ?>"><?php echo $local->descricao ?></option>
		          <?php } ?>
		          </select>
	  		</div>
	  		<button type="submit" class="btn btn-success">
	  			<span class="glyphicon glyphicon-plus">&nbsp;</span>Salvar
	  		</button>
	    </form>
    </div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">Itens Armazenados</div>
    <div class="panel-body">
    	<table class="table">
    		<thead>
    			<tr>
    				<th>Local</th>
    				<th>Qtd.</th>
    				<th>Ações</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php foreach (ItemLocal::find('all', array('conditions' => "item_id = $item->id")) as $itemlocal) { ?>	
    			<tr>
    				<td><?php echo $itemlocal->local->descricao ?></td>
    				<td><?php echo $itemlocal->qtd ?></td>
    				<td>
    					<a href="../../controllers/itemlocalcontroller.php?action=delete&local_id=<?php echo $itemlocal->local_id ?>&item_id=<?php echo $itemlocal->item_id?>"
            				onclick="return confirm('Deseja realmente remover?');">
          					<button type="button" class="btn btn-danger btn-xs">
            					<span class="glyphicon glyphicon-trash"></span> Excluir
          					</button>
          				</a>
    				</td>
    			</tr>
    			<?php }?>
    		</tbody>
    	</table>
    </div>
    </div>
    <a href="item_local_lista.php">
		<button type="button" class="btn btn-danger">Voltar</button>
  	</a>
  </div>
</div>
<?php include "../../includes/header.php"; ?>