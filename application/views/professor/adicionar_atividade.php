    <link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

    <main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
      <div class="col-md-10">
        <h1 class="page-header"> <?= $disciplina[0]->nome_disciplina ?> </h1>
      </div>

      <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="<?= base_url('professor/criar_iteracao/'.$disciplina[0]->idDisciplina); ?>"> Adicionar Iteração </a>
      </div>

      <div class="padding col-md-12">
        <h4> Minhas Disciplinas </h4>
        <table class="table table-striped">
          <tr>
            <th> Número da Iteração </th>
            <th> Código da Disciplina </th>
            <th> Disciplina </th>
            <th> Ações </th>
          </tr>
        </table>

      </div>
    </main>
  </div>
</div>
