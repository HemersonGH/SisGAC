<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Editar Disciplina </h1>
  </div>

  <div class="col-md-6 form-control">
    <form class="padding" action="<?= base_url(); ?>professor/salvar_atualizacao_disciplina" method="post">
      <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?= $disciplina[0]->idDisciplina ?>">

      <div class="row">
        <div class="col-md-12">
          <label for="nome_disciplina" class="padding"> <h6> Nome da Disciplina: </h6> </label>
          <input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" value="<?= $disciplina[0]->nome_disciplina; ?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="codigo_disciplina" class="padding"> <h6> Código da Disciplina: </h6> </label>
          <input type="text" class="form-control" id="codigo_disciplina" name="codigo_disciplina" value="<?= $disciplina[0]->codigo_disciplina; ?>" required>
        </div>
        <div class="col-md-6">
          <label for="status" class="padding"> <h6> Status: </h6> </label>
          <select id="status" name="status" class="form-control" required>
            <option value="NULL" <?= $disciplina[0]->status == null ? 'selected':''; ?> > Em Andamento </option>
            <option value="1"    <?= $disciplina[0]->status == 1 ? 'selected':''; ?> > Disponível </option>
            <option value="0"    <?= $disciplina[0]->status == 0 ? 'selected':''; ?> > Finalizada </option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="descricao_disciplina" class="padding"> <h6> Descrição da Disciplina: </h6> </label>
          <textarea class="form-control descricao_height" id="descricao_disciplina" name="descricao_disciplina" required><?= $disciplina[0]->descricao_disciplina; ?></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <a type="btn" class="paddingButton btn btn-secondary left" href="<?= base_url(); ?>professor" > Cancelar </a>
          <button type="submit" class="paddingButton btn btn-success right"> Atualizar </button>
        </div>
      </div>

    </div>
  </form>
</div>

</main>
</div>
</div>
