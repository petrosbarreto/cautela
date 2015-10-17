
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Local</div>
  <div class="panel-body">
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form class="form-inline" role="form" action="../../controllers/localcontroller.php" method="post">
      <input type="hidden" id="action" name="action" value="new"/>
      <div class="form-group">
        <div class="col-sm-10">
          <input type="text" required="true"
               placeholder="Descrição" id="descricao" name="descricao"
               value="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">
          <select required="true" id="local_tipo_id" name="local_tipo_id" class="form-control">
          <?php foreach (LocalTipo::find('all', array('order' => 'descricao asc')) as $localtipo) { ?>
          	<option value="<?php echo $localtipo->id ?>"><?php echo $localtipo->descricao ?></option>
          <?php } ?>
          </select>
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
        <th>Tipo</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (Local::find('all', array('order' => 'descricao asc')) as $local) { ?>
      <tr>
        <td><?php echo $local->id ?></td>
        <td><?php echo $local->descricao ?></td>
        <td><?php echo $local->local_tipo->descricao ?></td>
        <td>
          <a href="local_form.php?action=update&id=<?php echo $local->id ?>&descricao=<?php echo $local->descricao ?>&local_tipo_id=<?php echo $local->local_tipo_id ?>">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-pencil"></span> Editar
          </button>
          </a>
          <a href="../../controllers/localcontroller.php?action=delete&id=<?php echo $local->id ?>"
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