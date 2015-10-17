
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Tipo Itens</div>
  <div class="panel-body">
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form class="form-inline" role="form" action="../../controllers/itemtipocontroller.php" method="post">
      <input type="hidden" id="action" name="action" value="new"/>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text" required="true"
               placeholder="Descrição" id="descricao" name="descricao"
               value="">
        </div>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    </div>
    </div>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Cód.</th>
        <th>Descrição</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (ItemTipo::find('all', array('order' => 'descricao asc')) as $itemtipo) { ?>
      <tr>
        <td><?php echo $itemtipo->id ?></td>
        <td><?php echo $itemtipo->descricao ?></td>
        <td>
          <a href="../../controllers/itemtipocontroller.php?action=delete&id=<?php echo $itemtipo->id ?>"
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