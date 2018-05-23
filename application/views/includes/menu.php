
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Code Igniter</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="#">Configurações</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="cursor:pointer;" data-toggle="modal" data-target="#myModalLogout"> Logout </a>
    </li>
  </ul>
  <form class="form-inline mt-2 mt-md-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar...">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
  </form>
</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4> Encerrar sessão </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja sair?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" style="cursor:pointer; color: white;" data-dismiss="modal"> Não </a>
        <a type="button" class="btn btn-primary" href="<?= base_url(); ?>dashboard/logout"> Sim </a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url(); ?>">Tela Inicial <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>usuario"> Usuários </a>
        </li>
      </ul>
    </nav>
