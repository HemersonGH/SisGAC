<link href="<?= base_url(); ?>assets/css/menu.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>aluno/matricular_disciplina" style="color: black;">
            <h5> <span class="fa fa-id-card-o" aria-hidden="true"></span> Matrícula </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>aluno" style="color: black;">
            <h5> <span class="fa fa-th-list" aria-hidden="true"> </span> Disciplinas
              <?php if ($quantidadeAtividadesRecusadas != 0): ?>
                <span class="fa fa-exclamation-triangle sizeBadge" data-tooltip="tooltip" title="Contém <?= $quantidadeAtividadesRecusadas; ?> atividade(s) recusada(s)">
                  <?= $quantidadeAtividadesRecusadas; ?>
                </span>
              <?php endif; ?>
            </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: black;">
            <h5> <span class="fa fa-list-alt" aria-hidden="true"> </span> Atividades </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>aluno/trofeus" style="color: black;">
            <h5> <span class="fa fa-trophy" aria-hidden="true"> </span> Troféus </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: black;">
            <h5> <span class="fa fa-group" aria-hidden="true"> </span> Equipe </h5>
          </a>
        </li>
      </ul>
    </nav>

    <script>
    $(document).ready(function(){
      $('[data-tooltip="tooltip"]').tooltip();
    });
    </script>
