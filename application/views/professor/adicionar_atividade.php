<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-10">
    <h1 class="page-header"> <?= $disciplina[0]->nome_disciplina ?> </h1>
  </div>

  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?= base_url(); ?>professor/criar_iteracao"> Adicionar Iteração </a>
  </div>


<!-- Modal -->
<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4> Excluir Disciplina </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir essa disciplina?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" style="cursor:pointer; color: white;" data-dismiss="modal"> Não </a>
        <a type="button" class="btn btn-primary" href="<?= base_url('professor/excluir_disciplina/'.$disciplina->idDisciplina); ?>"> Sim </a>
      </div>
    </div>
  </div>
</div>

</main>
</div>
</div>
