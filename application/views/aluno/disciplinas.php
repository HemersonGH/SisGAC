<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-9">
    <h1 class="page-header"> Disciplinas </h1>
  </div>

  <div class="col-md-3">
    <a class="btn btn-primary btn-block font" href="<?= base_url(); ?>aluno/matricular_disciplina">
      <span class="fa fa-plus-square" aria-hidden="true"> </span> Matricular Disciplina
    </a>
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
        <th> Status da Disciplina </th>
        <th> Status da Matrícula </th>
        <th> Ações </th>
      </tr>
      <?php foreach ($disciplinas_matriculado as $disciplina) { ?>
        <tr>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Nome_Professor($disciplina->idProfessor); ?> </td>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Nome_Disciplina($disciplina->idDisciplina); ?> </td>
          <td> <?= $this->load->library('application/controllers/aluno')->aluno->get_Status_Disciplina($disciplina->idDisciplina) == 2 ? 'Disponível':'Finalizada'; ?> </td>
          <td> <?= $disciplina->status_participacao == 1 ? 'Aceitado' : 'Rejeitado'; ?> </td>
          <td>

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
