<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Form Tipo Contas</div>
  <div class="panel-body">
    <form role="form" class="form-horizontal" action="../../controllers/produtoscontascontroller.php" method="post" >
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
  			<label for="id" class="col-sm-2 control-label">Descricao</label>
  			<div class="col-sm-10">
	    		<input type="text" class="form-control" 
	    			   placeholder="Descricao" id="descricao" name="descricao"
	    			   value="<?php echo $_GET['descricao'] ?>">
    		</div>
  		</div>
  		<div class="form-group">
  			<div class="col-sm-offset-2 col-sm-10">
		  		<button type="submit" class="btn btn-success">Salvar</button>
	  			<a href="produtos_contas_lista.php">
	  				<button type="button" class="btn btn-danger">Voltar</button>
	  			</a>
  			</div>
  		</div>
    </form>
  </div>
</div>
<?php include "../../includes/header.php"; ?>

