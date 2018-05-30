<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">


<div class="col-md-12">
  <form action="<?= base_url(); ?>professor/cadastrar_conjAtiv_disciplina" method="post">
    <div class="row">
      <div class="col-md-4">
        <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?= $disciplina[0]->idDisciplina; ?>">
        <label for="idConjuntoAtividade"> <h5> Conjuntos de Atividades: </h5> </label>
        <select class="form-control paddingBotton" id="idConjuntoAtividade" name="idConjuntoAtividade" required>
          <?php if ($conjunto_atividades_sem_disciplina == null): ?>
            <option value=""> </option>
            <option value=""> Sem dados </option>
          <?php else: ?>
            <?php foreach ($conjunto_atividades_sem_disciplina as $conjunto_atividades): ?>
              <option value="<?= $conjunto_atividades->idConjuntoAtividade?> "> <?= $conjunto_atividades->nome_conjunto; ?> </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block paddingButtonAdd cursor" id="add" name="add"> Adicionar </button>
      </div>
    </div>
  </form>
</div>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
