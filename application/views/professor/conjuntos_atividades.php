<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-10">
    <h1 class="page-header"> Atividades </h1>
  </div>

  <div class="col-md-2">
    <button class="btn btn-primary btn-block cursor" data-toggle="modal" data-target="#myModalCriarConjunto">
      <span class="fa fa-plus-square" aria-hidden="true"> </span> Criar Conjunto
    </button>
  </div>

<div class="padding col-md-12">
  <h5> Conjuntos de Atividades </h5>
  <table class="table table-striped">
    <tr>
      <th> Nome do Conjunto </th>
      <th> Nº de Atividades </th>
      <th> Ações </th>
    </tr>
    <?php foreach ($conjunto_atividades as $conjunto_atividade) { ?>
      <tr>
        <td> <?= $conjunto_atividade->nome_conjunto; ?> </td>
        <td> <?= $this->load->library('application/controllers/professor')->professor->get_Qtd_Atividades($conjunto_atividade->idConjuntoAtividade); ?> </td>
        <td>
          <a title="Adicionar atividade para o conjunto" href="<?= base_url('professor/atividades_conjunto/'.$conjunto_atividade->idConjuntoAtividade); ?>">
            <span class="fa fa-paste paste mr-2 " aria-hidden="true"> </span>
          </a>
          <!-- <button type="button" class="btn btn-primary btn-group mr-1 cursor" title="Editar conjunto"> -->
            <span class="fa fa-pencil pencil mr-2" aria-hidden="true" title="Editar conjunto"></span>
          <!-- </button> -->
          <!-- <button title="Excluir conjunto"> -->
            <span class="fa fa-remove remove mr-2" aria-hidden="true" title="Excluir conjunto"></span>
          <!-- </button> -->
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
