<link href="<?= base_url(); ?>assets/css/professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Avaliar Solicitação </h1>
  </div>
  <div class="col-md-12">
    <div class="form-control col-md-6 paddingBotton">
      <form action="<?= base_url(); ?>professor/salvar_avaliacao_solicitacao" method="post">
        <input type="hidden" id="idSolicitacao" name="idSolicitacao" value="<?= $solicitacao[0]->idSolicitacao; ?>">
        <div class="row">
          <div class="col-md-12">
            <label for="nome_aluno" class="padding"> <h6> Nome do Aluno: </h6> </label>
            <input type="text" class="form-control camp" id="nome_aluno" name="nome_aluno" value="<?= $this->load->library('application/controllers/professor')->professor->get_Nome_Aluno($solicitacao[0]->idAluno); ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="disciplina_solicitada" class="paddingUp"> <h6> Disciplina Solicitada: </h6> </label>
            <input type="text" class="form-control" id="disciplina_solicitada" name="disciplina_solicitada" value="<?= $this->load->library('application/controllers/professor')->professor->get_Nome_Disciplina($solicitacao[0]->idDisciplina); ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="justificativa_aluno" class="paddingUp"> <h6> Justificativa do Aluno: </h6> </label>
            <textarea class="form-control justificativa" id="justificativa_aluno" name="justificativa_aluno" disabled><?= $solicitacao[0]->justificativa_aluno; ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="status_solicitacao" class="paddingUp"> <h6> Status da Solicitação: </h6> </label>
            <select id="status_solicitacao" name="status_solicitacao" class="form-control" required>
              <option value="1" <?= $solicitacao[0]->status_solicitacao == 1 ? 'selected':''; ?> > Pendente </option>
              <option value="2" <?= $solicitacao[0]->status_solicitacao == 2 ? 'selected':''; ?> > Aceitar </option>
              <option value="3" <?= $solicitacao[0]->status_solicitacao == 3 ? 'selected':''; ?> > Recusar </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="justificativa_professor" class="paddingUp"> <h6> Justificativa do Professor: </h6> </label>
            <textarea class="form-control justificativa" id="justificativa_professor" name="justificativa_professor" required><?= $solicitacao[0]->justificativa_professor; ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a class="paddingButton btn btn-danger left" href="<?= base_url(); ?>professor/solicitacoes_disciplinas"> Cancelar </a>
            <button type="submit" class="paddingButton btn btn-success right"> Salvar Avaliação </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
</div>
</div>
