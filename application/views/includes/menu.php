
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button"
    data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?= base_url('usuario/'.$this->session->userdata('tipoUsuario')); ?>"> Home </a>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('usuario/atualizar/'.$this->session->userdata('idUsuario')); ?>"> Perfil </a>
    </li>
  </ul>
  <form class="mt-2 mt-md-0">
      <a type="btn" class="btn btn-danger mr-sm-2" style="cursor:pointer; color: white;"
        data-toggle="modal" data-target="#myModalLogout"> Logout </a>
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
        <a type="button" class="btn btn-primary" href="<?= base_url(); ?>usuario/logout"> Sim </a>
      </div>
    </div>
  </div>
</div>
