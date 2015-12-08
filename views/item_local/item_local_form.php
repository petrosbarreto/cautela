<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>

<?php $item = Item::find($_GET['id']); ?>

<div class="panel panel-default">
  <div class="panel-heading">Item</div>
  <div class="panel-body">
    <form role="form" class="form-horizontal" action="../../controllers/itemcontroller.php" method="post" >
    	<input type="hidden" id="action" name="action" value="<?php echo $_GET['action']; ?>"/>
    	<input type="hidden" id="id2" name="id" value="<?php echo $_GET['id']; ?>"/>
    	<div class="form-group">
    		<label for="id" class="col-sm-2 control-label">Cod.</label>
    		<div class="col-sm-10">
    			<input type="text"  class="form-control" 
    				   size="4" id="id" name="id"
    				   value="<?php echo $_GET['id'] ?>" 
    				   disabled>
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Patrimônio</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control"
	    			   placeholder="Patrimônio" id="patrimonio" name="patrimonio"
	    			   value="<?php echo $item->patrimonio ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Nome</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control" required="true"
	    			   placeholder="Nome" id="nome" name="nome"
	    			   value="<?php echo $item->nome ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Descrição</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control" required="true"
	    			   placeholder="Descrição" id="descricao" name="descricao"
	    			   value="<?php echo $item->descricao ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Qtd. Total</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control" required="true"
	    			   placeholder="Qtd. Total" id="qtd_total" name="qtd_total"
	    			   value="<?php echo $item->qtd_total ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Tipo</label>
  			<div class="col-sm-10">
	  			<select required="true" id="item_tipo_id" name="item_tipo_id" class="form-control">
	          <?php foreach (ItemTipo::find('all', array('order' => 'descricao asc')) as $itemtipo) { ?>
	          	<option <?php echo $item->item_tipo_id==$itemtipo->id?'selected':''?> value="<?php echo $itemtipo->id ?>"><?php echo $itemtipo->descricao ?></option>
	          <?php } ?>
	          </select>
          	</div>
  		</div>
  		<div class="form-group">
  			<div class="col-sm-offset-2 col-sm-10">
		  		<button type="submit" class="btn btn-success">Salvar</button>
	  			<a href="item_lista.php">
	  				<button type="button" class="btn btn-danger">Voltar</button>
	  			</a>
  			</div>
  		</div>
    </form>
  </div>
</div>
<?php include "../../includes/header.php"; ?>