<link href="<?= base_url(); ?>assets/css/menu.css" rel="stylesheet">

<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>professor" style="color: black;">
            <h5> <span class="fa fa-th-list" aria-hidden="true"></span> Disciplinas </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>professor/atividades" style="color: black;">
            <h5> <span class="fa fa-list-alt" aria-hidden="true"></span> Atividades </h5>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>professor/solicitacoes_disciplinas" style="color: black;">
            <h5> <span class="fa fa-id-card-o" aria-hidden="true"></span> Solicitações
              <span class="badge badge-danger badge-pill sizeBadge">
                <?= $this->load->library('application/controllers/professor')->professor->get_Solicitacoes($idProfessor); ?>
              </span>
            </h5>
          </a>
        </li>
      </ul>
    </nav>
