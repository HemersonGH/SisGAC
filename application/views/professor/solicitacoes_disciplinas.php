<link href="<?= base_url(); ?>assets/css/professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header "> Solicitações de Matrícula em Disciplinas </h1>
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
      <?php foreach ($solicitacoes_disciplinas as $solicitacao) { ?>
        <tr>
          <td> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Aluno($solicitacao->idAluno); ?> </td>
          <td> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Disciplina($solicitacao->idDisciplina); ?> </td>
          <td> <?= $solicitacao->status_solicitacao == null ? 'Pendente':($solicitacao->status_solicitacao == 1 ? 'Aceita':'Recusada'); ?> </td>
          <td>
            <span class="fa fa-handshake-o handshake mr-2 cursor" aria-hidden="true" data-tooltip="tooltip" title="Avaliar Solicitação"
              onclick="avaliarSolicitacao(<?= $solicitacao->idSolicitacao; ?>, <?= $solicitacao->status_solicitacao; ?>)" data-toggle="modal" data-target="#myModalAvaliarSolicitacaoDisciplina">
            </span>
            <span class="fa fa-remove remove mr-2 cursor" aria-hidden="true" data-tooltip="tooltip" title="Excluir Solicitação"
              onclick="confimarExcluirSolicitacao(<?= $solicitacao->idSolicitacao; ?>)" data-toggle="modal" data-target="#myModalExcluirSolicitacaoDisciplina">
            </span>
          </td>
        </tr>
      <?php } ?>
    </table>

    <script>
      $(document).ready(function(){
        $('[data-tooltip="tooltip"]').tooltip();
      });
    </script>

    <script type="text/javascript">
      function avaliarSolicitacao(idSolicitacao, status_solicitacao) {
        document.getElementById("idAvaliarSolicitacao").value = idSolicitacao;
        document.getElementById("idStatusSolicitacao").value = status_solicitacao;
        var status = "sdfsdgsdg";
      }
    </script>

    <?php $ss = "<script>document.write(status)</script>"; ?>

    <script type="text/javascript">
      function confimarExcluirSolicitacao(idSolicitacao) {
        document.getElementById("idSolicitacao").value = idSolicitacao;
      }
    </script>

    <!-- Modal Avaliar Solicitação de Matrícula em Disciplina -->
    <div class="modal fade" id="myModalAvaliarSolicitacaoDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form class="" action="<?= base_url(); ?>professor/avaliar_solicitacao" method="post">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4> Avaliar Solicitação </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="status" class="padding"> <h6> Status: </h6> </label>
              <select id="idStatus" name="idStatus" class="form-control" required>
                <option value="NULL" > <?= $ss; ?> </option>
                <option value="1"    > Aceitar </option>
                <option value="0"    > Recusar </option>
              </select>
            </div>
            <div class="modal-footer">
              <input type="hidden" id="idAvaliarSolicitacao" name="idAvaliarSolicitacao">
              <input type="hidden" id="idStatusSolicitacao" name="idStatusSolicitacao">
              <button type="button" class="btn btn-danger cursor" data-dismiss="modal"> Não </button>
              <button type="submit" class="btn btn-primary cursor"> Sim </button>
              </div>
            </div>
          </div>
        </form>
      </div>

    <!-- Modal Excluir Solicitação de Matrícula em Disciplina -->
    <div class="modal fade" id="myModalExcluirSolicitacaoDisciplina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form class="" action="<?= base_url(); ?>professor/excluir_solicitacao" method="post">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4> Excluír Solicitação </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Tem certeza que deseja excluir essa solicitação de matrícula?
            </div>
            <div class="modal-footer">
              <input type="hidden" id="idSolicitacao" name="idSolicitacao">
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
