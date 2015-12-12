
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Item</div>
  <div class="panel-body">
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form class="form-inline" role="form" action="../../controllers/itemcontroller.php" method="post">
      <input type="hidden" id="action" name="action" value="new"/>
      <div class="form-group">
          <input type="text"
               placeholder="Patrimônio" id="patrimonio" name="patrimonio"
               value="" class="form-control">
      </div>
      <div class="form-group">
          <input type="text"
               placeholder="Nome" id="nome" name="nome"
               value="" class="form-control">
      </div>
      <div class="form-group">
          <input type="text"
               placeholder="Descrição" id="descricao" name="descricao"
               value="" class="form-control">
      </div>
      <div class="form-group">
          <input type="text" required="true"
               placeholder="Quantidade" id="qtd_total" name="qtd_total"
               value="1" size="2" class="form-control">
      </div>
      <div class="form-group">
          <select id="item_tipo_id" name="item_tipo_id" class="form-control" >
          	<option value="">Todos</option>
          <?php foreach (ItemTipo::find('all', array('order' => 'descricao asc')) as $itemtipo) { ?>
          	<option value="<?php echo $itemtipo->id ?>"><?php echo $itemtipo->descricao ?></option>
          <?php } ?>
          </select>
      </div>
      <button type="submit" class="btn btn-info" onclick="jQuery('#action').val('index')">
      	<span class="glyphicon glyphicon-search">&nbsp;</span>Buscar</button>
      <button type="submit" class="btn btn-success" onclick="jQuery('#action').val('new')">
      	<span class="glyphicon glyphicon-floppy-disk">&nbsp;</span>Salvar</button>
    </form>
    </div>
    </div>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Cód.</th>
        <th>Patrimônio</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Qtd. Total</th>
        <th>Tipo</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php
      	$query = "1=1";
       
      	if(isset($_GET['patrimonio'])) {
      		$patrimonio = $_GET['patrimonio'];
      		$query.=" and patrimonio = '$patrimonio' " ;
      	}
      	if(isset($_GET['nome'])) {
      		$nome = $_GET['nome'];
      		$query.=" and nome LIKE '%$nome%' ";
      	}
      	if(isset($_GET['tipo'])) {
      		$tipo = $_GET['tipo'];
      		$query .=" and item_tipo_id = $tipo ";
      	}
      	foreach (Item::find('all', array('conditions' => $query, 'order' => 'nome asc')) as $item) { ?>
      <tr>
        <td><?php echo $item->id ?></td>
        <td><?php echo $item->patrimonio ?></td>
        <td><?php echo $item->nome ?></td>
        <td><?php echo $item->descricao ?></td>
        <td><?php echo $item->qtd_total ?></td>
        <td><?php echo $item->item_tipo->descricao ?></td>
        <td>
          <a href="item_form.php?action=update&id=<?php echo $item->id ?>">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-pencil"></span> Editar
          </button>
          </a>
          <a href="../../controllers/itemcontroller.php?action=delete&id=<?php echo $item->id ?>"
            onclick="return confirm('Deseja realmente remover?');">
          <button type="button" class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-trash"></span> Excluir
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