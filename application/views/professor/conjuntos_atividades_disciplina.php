
<div class="padding col-md-12">
  <h4> Conjuntos de Atividades Adicionados </h4>
  <table class="table table-striped">
    <tr>
      <th> Nome do Conjunto </th>
      <th> Nº de Atividades </th>
      <th> Ações </th>
    </tr>
    <?php foreach ($conjunto_atividades_da_disciplina as $conjuntos_atividades) { ?>
      <tr>
        <td> <?= $conjuntos_atividades->nome_conjunto; ?> </td>
        <td> <?= $this->load->library('application/controllers/professor')->professor->get_Qtd_Atividades($conjuntos_atividades->idConjuntoAtividade); ?> </td>
        <td>
          <a title="Remover conjunto da disciplina" data-toggle="tooltip" onclick="return confirm('Deseja realmente remover esse conjunto da disciplina?');"
            href="<?= base_url('professor/remove_conjunto_atividade_disciplina/'.$conjuntos_atividades->id_disciplina_conjunto.'/'.$conjuntos_atividades->idConjuntoAtividade); ?>">
            <span class="fa fa-remove remove mr-2 cursor" aria-hidden="true"></span>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</div>
</main>
</div>
</div>
