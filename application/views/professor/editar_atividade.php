<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Editar Atividade </h1>
  </div>

  <div class="form-control col-md-6">
    <form class="padding" action="<?= base_url(); ?>professor/salvar_atualizacao_atividade" method="post">
      <input type="hidden" id="idProfessor" name="idProfessor" value="<?= $this->session->userdata('idUsuario'); ?>">
      <input type="hidden" id="id_conjunto" name="id_conjunto" value="<?= $atividade[0]->idConjuntoAtividade; ?>">
      <input type="hidden" id="idAtividade" name="idAtividade" value="<?= $atividade[0]->idAtividade; ?>">

      <div class="row">
        <div class="col-md-12">
          <label for="nome_atividade" class="padding"> <h6> Nome da Atividade: </h6> </label>
          <input type="text" class="form-control camp" id="nome_atividade" name="nome_atividade" value="<?= $atividade[0]->nome_atividade; ?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label for="data" class="padding"> <h6> Data de Entrega: </h6> </label>
          <input type="date" class="form-control" id="data" name="data" value="<?= date('Y-m-d', strtotime($atividade[0]->prazo_entrega)); ?>" required>
        </div>
        <div class="col-md-6">
          <label for="valor_atividade" class="padding"> <h6> Valor da Atividade: </h6> </label>
          <input type="number" class="form-control camp" id="valor_atividade" name="valor_atividade" value="<?= $atividade[0]->pontos; ?>"required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="descricao_atividade" class="padding paddingUp"> <h6> Descrição da Atividade: </h6> </label>
          <textarea class="form-control descricao_atividade" id="descricao_atividade" name="descricao_atividade" required><?= $atividade[0]->descricao_atividade; ?></textarea>
        </div>
      </div>

      <a type="btn" class="paddingButton btn btn-secondary left" href="<?= base_url('professor/atividades_conjunto/'.$atividade[0]->idConjuntoAtividade); ?>"> Cancelar </a>
      <button type="submit" class="paddingButton btn btn-success right"> Atualizar Atividade </button>
    </div>
  </form>
</div>

</main>
</div>
</div>
