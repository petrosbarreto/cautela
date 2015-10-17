<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Local</div>
  <div class="panel-body">
    <form role="form" class="form-horizontal" action="../../controllers/localcontroller.php" method="post" >
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
  			<label for="id" class="col-sm-2 control-label">Descrição</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control" required="true"
	    			   placeholder="Descrição" id="descricao" name="descricao"
	    			   value="<?php echo $_GET['descricao'] ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<label for="id" class="col-sm-2 control-label">Tipo</label>
  			<div class="col-sm-10">
	  			<select required="true" id="local_tipo_id" name="local_tipo_id" class="form-control">
	          <?php foreach (LocalTipo::find('all', array('order' => 'descricao asc')) as $localtipo) { ?>
	          	<option <?php echo $_GET['local_tipo_id']==$localtipo->id?'selected':''?> value="<?php echo $localtipo->id ?>"><?php echo $localtipo->descricao ?></option>
	          <?php } ?>
	          </select>
          	</div>
  		</div>
  		<div class="form-group">
  			<div class="col-sm-offset-2 col-sm-10">
		  		<button type="submit" class="btn btn-success">Salvar</button>
	  			<a href="local_lista.php">
	  				<button type="button" class="btn btn-danger">Voltar</button>
	  			</a>
  			</div>
  		</div>
    </form>
  </div>
</div>
<?php include "../../includes/header.php"; ?>