<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<div class="padding col-md-12">
<!-- <h4> Conjuntos de Atividades Adicionados </h4> -->

<?php foreach ($conjunto_atividades_da_disciplina as $conjuntos_atividades) { ?>
  <div class="spaceBeetwenComponents">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center"> Valor </th>
          <th class="text-center"><?= $conjuntos_atividades->nome_conjunto;?></th>
          <th class="text-center"> Data de Entrega </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->load->library('application/controllers/professor')->professor->get_Atividades($conjuntos_atividades->idConjuntoAtividade) as $atividade) { ?>
          <tr>
            <td class="text-center"> <?= $atividade->pontos; ?> </td>
            <td class="text-center"> <?= $atividade->nome_atividade; ?> </td>
            <td class="text-center"> <?= str_replace("-", "/", date('d-m-Y', strtotime($atividade->prazo_entrega))); ?> </td>
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
