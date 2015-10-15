
<?php include      "../../includes/header.php"; ?>

<body>
<?php include      "../../includes/messages.php"; ?>
<div class="panel panel-default">
  <div class="panel-heading">Listar Tipo Produtos</div>
  <div class="panel-body">
    <a href="produtos_contas_form.php?action=new">
      <input type="button" class="btn btn-success" name="submint" value="Adicionar"/>
    </a>
    <table class="table"  cellSpacing=1 cellPadding=4 width="100%" border=0>
      <thead>
      <tr> 
        <th>Cod.</th>
        <th>Descricao</th>
        <th>Acao</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (ProdutosConta::all() as $produtos_conta) { ?>
      <tr>
        <td><?php echo $produtos_conta->id ?></td>
        <td><?php echo $produtos_conta->descricao ?></td>
        <td>
          <a href="produtos_contas_form.php?action=update&id=<?php echo $produtos_conta->id ?>&descricao=<?php echo $produtos_conta->descricao ?>">
          <button type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-pencil"></span> Editar
          </button>
          </a>
          <a href="../../controllers/produtoscontascontroller.php?action=delete&id=<?php echo $produtos_conta->id ?>"
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
<?php include "../../includes/header.php"; ?>