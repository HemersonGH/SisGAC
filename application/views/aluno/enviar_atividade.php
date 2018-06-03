<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

  <div class="col-md-12">
    <div class="form-control col-md-6 paddingBotton">
      <form class="padding" action="<?= base_url(); ?>aluno/salvar_atividade_enviada" method="post">
        <input type="hidden" id="idAtividade" name="idAtividade" value="<?= $atividadeEnviar[0]->idAtividade; ?>">
        <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?= $idDisciplina; ?>">
        <div class="row">
          <div class="col-md-12">
            <label for="nomeAtividade" class="padding"> <h6> Nome da Atividade: </h6> </label>
            <input type="text" class="form-control camp" id="nomeAtividade" name="nomeAtividade" value="<?= $atividadeEnviar[0]->nome_atividade; ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="data" class="padding"> <h6> Prazo de Entrega: </h6> </label>
            <input type="date" class="form-control" id="data" name="data" value="<?= date('Y-m-d', strtotime($atividadeEnviar[0]->prazo_entrega)); ?>" disabled>
          </div>
          <div class="col-md-6">
            <label for="valorAtividade" class="padding"> <h6> Valor da Atividade: </h6> </label>
            <input type="number" class="form-control camp" id="valorAtividade" name="valorAtividade" value="<?= $atividadeEnviar[0]->pontos; ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="descricao_atividade" class="padding"> <h6> Descrição da Atividade: </h6> </label>
            <textarea class="form-control descricao_atividade" id="descricao_atividade" name="descricao_atividade" disabled><?= $atividadeEnviar[0]->descricao_atividade; ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="resolucao" class="padding"> <h6> Resolução: </h6> </label>
            <textarea class="form-control resolucao" id="resolucao" name="resolucao"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="anexo" class="padding"> <h6> Anexos: </h6> </label>
            <input type="text" class="form-control camp paddingBotton" id="anexo" name="anexo" value="" disabled>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <a class="paddingButton btn btn-danger left" href="<?= base_url('aluno/atividades_disciplina/'.$idDisciplina); ?>"> Cancelar </a>
            <button type="submit" class="paddingButton btn btn-success right"> Enviar Atividade </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
</div>
</div>
