<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Solicitações de Matrícula </h1>
  </div>

  <div class="padding col-md-12">
    <h4> Conjuntos de Atividades Adicionados </h4>
    <table class="table table-striped">
      <tr>
        <th> Nome do Aluno </th>
        <th> Disciplina </th>
        <th> Status </th>
        <th> Ações </th>
      </tr>

    </table>

    <script>
    $(document).ready(function(){
      $('[data-tooltip="tooltip"]').tooltip();
    });
    </script>

    <script type="text/javascript">
    function confirmarRemocaoConjAtividade(idConjuntoAtividadeRemover, idDisciplinaRemover) {
      document.getElementById("idConjuntoAtividadeRemover").value = idConjuntoAtividadeRemover;
      document.getElementById("idDisciplinaRemover").value = idDisciplinaRemover;
    }
    </script>

    <!-- Modal Remover Conjunto Atividades da Disciplina -->
    <div class="modal fade" id="myModalRemoverConjuntoAtividadeDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form class="" action="<?= base_url(); ?>professor/remove_conjunto_atividade_disciplina" method="post">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4> Remover conjunto da disciplina </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Tem certeza que deseja remover esse conjunto de atividades da disciplina?
            </div>
            <div class="modal-footer">
              <input type="hidden" id="idConjuntoAtividadeRemover" name="idConjuntoAtividadeRemover">
              <input type="hidden" id="idDisciplinaRemover" name="idDisciplinaRemover">
              <button type="button" class="btn btn-danger" style="cursor:pointer; color: white;" data-dismiss="modal"> Não </button>
              <button type="submit" class="btn btn-primary"> Sim </a>
              </div>
            </div>
          </div>
        </form>
      </div>


    </div>
  </main>
</div>
</div>
