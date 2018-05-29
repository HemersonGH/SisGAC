    <link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

    <main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
      <div class="col-md-12">
        <h1 class="page-header"> Nova Disciplina </h1>
      </div>

      <div class="col-md-6 form-control form-group">
        <form class="padding" action="<?= base_url(); ?>professor/cadastrar_disciplina" method="post">
          <input type="hidden" id="idProfessor" name="idProfessor" value="<?= $this->session->userdata('idUsuario')?>">

          <div class="row">
            <div class="col-md-12">
              <label for="nome_disciplina" class="padding"> <h6> Nome da Disciplina: </h6> </label>
              <input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <label for="codigo_disciplina" class="padding"> <h6> Código da Disciplina: </h6> </label>
              <input type="text" class="form-control" id="codigo_disciplina" name="codigo_disciplina" required>
            </div>
            <!-- <div class="col-md-6">
              <label for="status" class="padding"> <h6> Status: </h6> </label>
              <select class="form-control " id="status" name="status" required>
                <option value="NULL"> Em Andamento </option>
                <option value="1"> Disponível </option>
                <option value="0"> Finalizada </option>
              </select>
            </div> -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <label for="descricao_disciplina" class="padding"> <h6> Descrição da Disciplina: </h6> </label>
              <textarea class="form-control descricao_height" id="descricao_disciplina" name="descricao_disciplina" required></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <a type="btn" class="paddingButton btn btn-secondary left" href="<?= base_url(); ?>professor" > Cancelar </a>
              <button type="submit" class="paddingButton btn btn-success right"> Criar Disciplina </button>
            </div>
          </div>

        </form>
      </div>
    </div>

    </main>
  </div>
</div>
