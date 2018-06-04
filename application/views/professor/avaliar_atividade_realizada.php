<link href="<?= base_url(); ?>assets/css/professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> <?= $this->load->library('application/controllers/professor')->professor->get_Nome_Conjunto($atividadeRealizada[0]->idAtividade); ?> </h1>
  </div>
  <div class="col-md-12">
    <div class="form-control col-md-6 paddingBotton">
      <form class="padding" action="<?= base_url('professor/salvar_avaliacao_atividade/'.$atividadeRealizada[0]->idAtividade.'/'.$atividadeRealizada[0]->idAluno); ?>" enctype="multipart/form-data" method="post">
        <input type="hidden" id="idAtividade" name="idAtividade" value="<?= $atividadeRealizada[0]->idAtividade; ?>">
        <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?= $atividadeRealizada[0]->idDisciplina; ?>">
        <div class="row">
          <div class="col-md-12">
            <label for="nomeAtividade" class="padding"> <h6> Nome da Atividade: </h6> </label>
            <input type="text" class="form-control camp" id="nomeAtividade" name="nomeAtividade" value="<?= $this->load->library('application/controllers/professor')->professor->get_Nome_Atividade($atividadeRealizada[0]->idAtividade); ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="data" class="padding"> <h6> Prazo de Entrega: </h6> </label>
            <input type="date" class="form-control" id="data" name="data" value="<?= date('Y-m-d', strtotime($this->load->library('application/controllers/professor')->professor->get_Prazo_Atividade($atividadeRealizada[0]->idAtividade))); ?>" disabled>
          </div>
          <div class="col-md-6">
            <label for="valorAtividade" class="padding"> <h6> Valor da Atividade: </h6> </label>
            <input type="number" class="form-control camp" id="valorAtividade" name="valorAtividade" value="<?= $this->load->library('application/controllers/professor')->professor->get_Pontos_Atividade($atividadeRealizada[0]->idAtividade); ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="descricao_atividade" class="padding"> <h6> Descrição da Atividade: </h6> </label>
            <textarea class="form-control descricao_atividade" id="descricao_atividade" name="descricao_atividade" disabled><?= $this->load->library('application/controllers/professor')->professor->get_Descricao_Atividade($atividadeRealizada[0]->idAtividade); ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="resposta_aluno" class="padding"> <h6> Resposta do Aluno: </h6> </label>
            <textarea class="form-control resposta" id="resposta_aluno" name="resposta_aluno" disabled><?= $atividadeRealizada[0]->resposta_aluno; ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="paddingButton anexo" class="padding"> <h6> Arquivo Anexado: </h6> </label>
            <a class="paddingButton btn btn-secondary" href="<?= base_url('professor/downloadAnexo/'.$atividadeRealizada[0]->anexo) ?>"> Download Arquivo </a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="resposta_professor" class="padding"> <h6> Resposta do Professor: </h6> </label>
            <textarea class="form-control resposta" id="resposta_professor" name="resposta_professor" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a class="paddingButton btn btn-danger left" href="<?= base_url(); ?>professor/avaliacoes_atividades_realizada"> Cancelar </a>
            <button type="submit" class="paddingButton btn btn-success right cursor"> Salvar Avaliação </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
</div>
</div>
