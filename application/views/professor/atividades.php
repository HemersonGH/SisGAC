<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-10">
    <h1 class="page-header"> Atividades </h1>
  </div>

  <div class="col-md-2">
    <button class="btn btn-primary btn-block cursor" data-toggle="modal" data-target="#myModalCriarConjunto"> Criar Conjunto </button>
  </div>

<div class="padding col-md-12">
  <h5> Conjuntos de Atividades </h5>
  <table class="table table-striped">
    <tr>
      <th> Nome do Conjunto </th>
      <th> Quantidade de Atividades </th>
      <th> Ações </th>
    </tr>
    <?php foreach ($conjunto_atividades as $conjunto_atividade) { ?>
      <tr>
        <td> <?= $conjunto_atividade->nome_conjunto; ?> </td>
        <td> </td>
        <td>
          <a class="btn btn-success mr-1 cursor" href="<?= base_url('professor/atividades_conjunto/'.$conjunto_atividade->idConjuntoAtividade); ?>"> Adicionar Atividade </a>
          <button type="button" class="btn btn-primary btn-group mr-1 cursor"> Atualizar </button>
          <button type="button" class="btn btn-danger btn-group mr-1 cursor"> Remover </button>
          </td>
      </tr>
    <?php } ?>
  </table>
</div>

<!-- Modal Criar Conjunto de Atividades-->
<div class="modal fade" id="myModalCriarConjunto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form class="" action="<?= base_url(); ?>professor/cadastrar_conjunto_atividades" method="post">
      <input type="hidden" id="id_professor" name="id_professor" value="<?= $this->session->userdata('idUsuario')?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4> Novo Conjunto de Atividades </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="nome_conjunto"> <h6> Nome do Conjunto: </h6> </label>
              <input type="text" class="form-control" name="nome_conjunto" id="nome_conjunto" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cursor" data-dismiss="modal"> Cancelar </button>
          <button type="submit" class="btn btn-primary cursor" href="<?= base_url(); ?>professor/cadastrar_conjunto_atividades"> Salvar </button>
        </div>
      </div>
    </form>
  </div>
</div>

</main>
</div>
</div>