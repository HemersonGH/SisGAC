<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-10">
    <h1 class="page-header"> Disciplinas </h1>
  </div>

  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?= base_url(); ?>professor/criar_disciplina"> Criar Disciplina </a>
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
  <h5> Minhas Disciplinas </h5>
  <table class="table table-striped paddingTable">
    <tr>
      <th> Professor </th>
      <th> Código da Disciplina </th>
      <th> Disciplina </th>
      <th> Ações </th>
    </tr>
    <?php foreach ($disciplinas as $disciplina) { ?>
      <tr>
        <td> <?= $this->session->userdata('nome'); ?> </td>
        <td> <?= $disciplina->codigo_disciplina; ?> </td>
        <td> <?= $disciplina->nome_disciplina; ?> </td>
        <td>
          <a class="btn btn-success mr-1 cursor" href="<?= base_url('professor/adicionar_iteracao/'.$disciplina->idDisciplina); ?>"> Escolher </a>
          <a class="btn btn-primary btn-group mr-1 cursor" href="<?= base_url('professor/atualizar_disciplina/'.$disciplina->idDisciplina); ?>"> Atualizar </a>
          <a href="<?= base_url('professor/excluir_disciplina/'.$disciplina->idDisciplina); ?>" class="btn btn-danger btn-group mr-0" onclick="return confirm('Deseja realmente remover essa disciplina?'); "> Remover </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

</main>
</div>
</div>


<!-- <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<h1> Disciplinas </h1> -->

<!-- <section class="row text-center placeholders">
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<div class="text-muted">Something else</div>
</div>
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<span class="text-muted">Something else</span>
</div>
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<span class="text-muted">Something else</span>
</div>
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<span class="text-muted">Something else</span>
</div>
</section> -->
<!--
<div class="card" style="width: 18rem;">
<img class="card-img-top" src="application/img/2.jpg" alt="Card image cap">
<div class="card-body">
<h5 class="card-title">Card title</h5>
<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</main>
</div>
</div> -->