<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Atualizar Disciplina </h1>
  </div>

  <div class="col-md-12 form-control form-group">
    <form class="col-md-6 ajust padding" action="<?= base_url(); ?>professor/salvar_atualizacao_disciplina" method="post">
      <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?= $disciplina[0]->idDisciplina ?>">

      <label for="nome_disciplina" class="padding"> <h6> Nome da Disciplina: </h6> </label>
      <input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" value="<?= $disciplina[0]->nome_disciplina; ?>" required>

      <label for="codigo_disciplina" class="padding"> <h6> Código da Disciplina: </h6> </label>
      <input type="text" class="form-control" id="codigo_disciplina" name="codigo_disciplina" value="<?= $disciplina[0]->codigo_disciplina; ?>" required>

      <label for="descricao_disciplina" class="padding"> <h6> Descrição da Disciplina: </h6> </label>
      <textarea class="form-control descricao_height" id="descricao_disciplina" name="descricao_disciplina" required><?= $disciplina[0]->descricao_disciplina; ?></textarea>

      <a type="btn" class="paddingButton btn btn-secondary left" href="<?= base_url(); ?>professor" > Cancelar </a>
      <button type="submit" class="paddingButton btn btn-success right"> Atualizar </button>
    </div>
  </form>
</div>

</main>
</div>
</div>
