<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

<div class="padding col-md-12">

  <?php foreach ($conjuntos_disciplina as $conjuntos_atividades) { ?>
    <div class="spaceBeetwenComponents">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="colorHeader text-center"> Valor </th>
            <th class="colorHeader text-center"><?= $conjuntos_atividades->nome_conjunto;?></th>
            <th class="colorHeader text-center"> Prazo de Entrega </th>
            <th class="colorHeader text-center"> Status </th>
            <th class="colorHeader text-center"> Ações </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->load->library('application/controllers/aluno')->aluno->get_Atividades($conjuntos_atividades->idConjuntoAtividade) as $atividade) { ?>
            <tr>
              <td class="text-center"> <?= $atividade->pontos; ?> Pontos </td>
              <td class="text-center"> <?= $atividade->nome_atividade; ?> </td>
              <td class="text-center"> <?= str_replace("-", "/", date('d-m-Y', strtotime($atividade->prazo_entrega))); ?> </td>
              <td class="text-center">

              </td>
              <td class="text-center">
                <a data-tooltip="tooltip" title="Enviar atividade" href="<?= base_url('aluno/enviar_atividade/'.$atividade->idAtividade); ?>">
                  <span class="fa fa-paper-plane paper_plane mr-2" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>


  <script>
  $(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
  });
  </script>

</div>
</main>
</div>
</div>
