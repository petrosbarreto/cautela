
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Item Local</div>
  <div class="panel-body">
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form class="form-inline" role="form" action="../../controllers/itemlocalcontroller.php" method="post">
      <input type="hidden" id="action" name="action" value="index"/>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text"
               placeholder="Patrimônio" id="patrimonio" name="patrimonio"
               value="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text"
               placeholder="Nome" id="nome" name="nome"
               value="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <select id="item_tipo_id" name="item_tipo_id" class="form-control" >
          	<option value="">Tipo Item - Todos</option>
          <?php foreach (ItemTipo::find('all', array('order' => 'descricao asc')) as $itemtipo) { ?>
          	<option value="<?php echo $itemtipo->id ?>"><?php echo $itemtipo->descricao ?></option>
          <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <select id="item_tipo_id" name="item_tipo_id" class="form-control" >
          	<option value="">Local - Todos</option>
          	<option value="NULL">Sem Local</option>
          <?php foreach (Local::find('all', array('order' => 'descricao asc')) as $local) { ?>
          	<option value="<?php echo $local->id ?>"><?php echo $local->descricao ?></option>
          <?php } ?>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-info">Buscar</button>
    </form>
    </div>
    </div>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Cód.</th>
        <th>Patrimônio</th>
        <th>Nome</th>
        <th>Qtd.</th>
        <th>Tipo</th>
        <th>Locais</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (Item::find('all', array('order' => 'nome asc')) as $item) { ?>
      <tr>
        <td><?php echo $item->id ?></td>
        <td><?php echo $item->patrimonio != null ? $item->patrimonio : "-" ?></td>
        <td><?php echo $item->nome ?></td>
        <td><?php echo $item->qtd_total ?></td>
        <td><?php echo $item->item_tipo->descricao ?></td>
        <td>
        	<?php
        		$count = 0;
        		foreach($item->locals as $local) {
        			$count++;
        			echo $local->descricao;
        			if($count < count($item->locals)) echo ", ";
				}
				if($count == 0) {
					echo "-";
				} 
        	?>
        </td>
        <td>
          <a href="item_local_form.php?id=<?php echo $item->id ?>">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-folder-open"></span> Local
          </button>
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
  </div>
</div>

<?php include "../../includes/footer.php"; ?>