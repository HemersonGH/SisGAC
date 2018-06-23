<link href="<?= base_url(); ?>assets/css/professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Avaliações de Atividades </h1>
  </div>

  <div class="padding col-md-12">
    <h5> Avaliações </h5>
    <div class="spaceBeetwenComponents">
      <table class="table table-striped">
        <tr>
          <th> Aluno </th>
          <th> Conjunto </th>
          <th> Atividade </th>
          <th> Status </th>
          <th> Ações </th>
        </tr>
        <?php foreach ($atividadesRealizada as $atividade) { ?>
          <tr>
            <td> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Aluno($atividade->idAluno); ?> </td>
            <td> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Conjunto($atividade->idAtividade); ?> </td>
            <td> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Atividade($atividade->idAtividade); ?> </td>
            <td>
              <?=
               $this->load->library('application/controllers/professor')->professor->get_Status_Atividade($atividade->idAtividade, $atividade->idAluno) == 2 ? 'Não Avaliada':
              ($this->load->library('application/controllers/professor')->professor->get_Status_Atividade($atividade->idAtividade, $atividade->idAluno) == 3 ? 'Recusada':'Aceita');
              ?>
            </td>
            <td>
              <?php if (($this->load->library('application/controllers/professor')->professor->get_Status_Atividade($atividade->idAtividade, $atividade->idAluno) == 2)): ?>
                <a data-tooltip="tooltip" title="Avaliar atividade" href="<?= base_url('professor/avaliar_atividade_realizada/'.$atividade->idAtividade.'/'.$atividade->idAluno); ?>">
                  <span class="fa fa-gavel pencil mr-2" aria-hidden="true"></span>
                </a>
              <?php else: ?>
                <span class="fa fa-gavel color_disabled mr-2" aria-hidden="true" data-tooltip="tooltip" title="Atividade já foi avaliada"></span>
              <?php endif; ?>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>

  <script>
  $(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
  });
  </script>
</div>
</main>
</div>
</div>
