    <link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

    <main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
      <div class="col-md-10">
        <h1 class="page-header"> <?= $conjunto_atividade[0]->nome_conjunto; ?> </h1>
      </div>

      <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="<?= base_url('professor/adicionar_atividade/'.$conjunto_atividade[0]->idConjuntoAtividade); ?>"> Criar Atividade </a>
      </div>

    <div class="padding col-md-12">
      <h5> Conjuntos de Atividades </h5>
      <table class="table table-striped paddingTable">
        <tr>
          <th> Nome do Conjunto </th>
          <th> Quantidade de Atividades </th>
          <th> Ações </th>
        </tr>

      </table>
    </div>

    </main>
  </div>
</div>
