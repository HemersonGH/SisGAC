<!-- Modal -->
<div class="modal fade" id="myModalExcluirDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <button type="button" class="btn btn-danger" style="cursor:pointer; color: white;" data-dismiss="modal"> Não </button>
        <a class="btn btn-primary" href="<?= base_url('professor/excluir_disciplina/'.$idDisciplina); ?>"> Sim </a>
      </div>
    </div>
  </div>
</div>
