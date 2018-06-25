<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Disciplinas </h1>
  </div>

  <!-- <div class="col-md-12" style="padding-bottom: 10px">
  <form action="usuario/pesquisar" method="post">
  <div class="row">
  <div class="col-md-10">
  <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
  </div>
  <div class="col-md-2">
  <button type="submit" class="btn btn-success btn-block">Pesquisar</button>
  </div>
  </div>
  </form>
  </div> -->

  <div class="padding col-md-12">
    <h5> Disciplinas Matrículadas </h5>
    <table class="table table-striped">
      <tr>
        <th> Professor </th>
        <th> Disciplina </th>
        <th> Código da Disciplina </th>
        <th> Status da Disciplina </th>
        <th> Ações </th>
      </tr>
      <?php foreach ($disciplinas_matriculado as $disciplina) { ?>
        <tr>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Nome_Professor($disciplina->idDisciplina); ?> </td>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Nome_Disciplina($disciplina->idDisciplina); ?> </td>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Cod_Disciplina($disciplina->idDisciplina); ?> </td>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Status_Disciplina($disciplina->idDisciplina) == 2 ? 'Disponível':'Finalizada'; ?> </td>
          <td>
            <?php if ($this->load->library('application/controllers/aluno')->aluno->get_Status_Disciplina($disciplina->idDisciplina) == 2): ?>
              <a data-tooltip="tooltip" title="Realizar atividades" href="<?= base_url('aluno/atividades_disciplina/'.$disciplina->idDisciplina); ?>">
                <span class="fa fa-pencil-square-o pencil_square" aria-hidden="true"></span>
              </a>
            <?php else: ?>
              <span data-tooltip="tooltip" title="Não é possuir realizar atividades dessa disciplina pois ela está Finalizada"
                class="fa fa-pencil-square-o pencil_square_disabled" aria-hidden="true">
              </span>
            <?php endif; ?>
            <?php if ($this->load->library('application/controllers/aluno')->aluno->get_Atividades_Disciplina_Recusadas($this->session->userdata('idUsuario'), $disciplina->idDisciplina) != 0): ?>
              <span class="fa fa-exclamation-triangle sizeBadge" data-tooltip="tooltip"
                title="Contém <?= $this->load->library('application/controllers/aluno')->aluno->get_Atividades_Disciplina_Recusadas($this->session->userdata('idUsuario'), $disciplina->idDisciplina); ?> atividade(s) recusada(s)">
            <?php endif; ?>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
  });
  </script>
</main>
</div>
</div>
