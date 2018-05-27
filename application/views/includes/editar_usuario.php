<link href="<?= base_url(); ?>assets/css/editar_usuario.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Atualizar Dados </h1>
  </div>

  <div class="col-md-12 form-control form-group">
    <form class="col-md-6 ajust" action="<?= base_url(); ?>usuario/salvar_atualizacao" method="post">
      <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
      <label for="name">Nome:</label>

      <input type="text" class="form-control" id="name" name="name" value="<?= $usuario[0]->nome; ?>" required>
      <label for="cpf" class="padding">CPF:</label>

      <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario[0]->cpf; ?>" required>
      <label for="data" class="padding"> Data de Nascimento: </label>

      <input type="date" class="form-control" id="data" name="data" value="<?= date('Y-m-d', strtotime($usuario[0]->data)); ?>" required>
      <label for="email" class="padding">Email:</label>

      <input type="email" class="form-control" id="email" name="email" value="<?= $usuario[0]->email; ?>" required>
      <label for="password" class="padding">Senha:</label>

      <input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#myModal">

      <a type="btn" class="paddingButton btn btn-secondary left" href="<?= base_url('usuario/'.$this->session->userdata('tipoUsuario')); ?>" > Cancelar </a>
      <button type="submit" class="paddingButton btn btn-success right"> Atualizar </button>
    </div>
  </form>
</div>

</main>
</div>
</div>

<!-- Modal Atualizar Senha-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form class="" action="<?= base_url(); ?>usuario/salvar_senha" method="post">
      <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h4> Atualizar Senha </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="senha_antiga"> Senha Antiga: </label>
              <input type="password" class="form-control" name="senha_antiga" id="senha_antiga">
            </div>
            <div class="col-md-12 form-group">
              <label for="senha_nova"> Nova Senha: </label>
              <input type="password" class="form-control" name="senha_nova" id="senha_nova" onkeyup="checkPassword()">
            </div>
            <div class="col-md-12 form-group">
              <label for="senha_confirmar"> Confirmar Senha: </label>
              <input type="password" class="form-control" name="senha_confirmar" id="senha_confirmar" onkeyup="checkPassword()">
            </div>
            <div class="col-md-12 form-group">
              <div id="divcheck">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Fechar </button>
          <button type="submit" class="btn btn-primary" id="enviarSenha" disabled> Salvar </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#senha_nova").keyup(checkPasswordMatch);
  $("#senha_confirmar").keyup(checkPasswordMatch);
});
function checkPassword() {
  var password = $("#senha_nova").val();
  var confirmPassword = $("#senha_confirmar").val();

  if (password == '' || '' == confirmPassword) {
    $("#divcheck").html("<span style='color:red'> Campo Senha vazio! </span>");
    document.getElementById("enviarSenha").disabled = true;
  } else if (password != confirmPassword) {
    $("#divcheck").html("<span style='color:red'> Senhas não conferem! </span>");
    document.getElementById("enviarSenha").disabled = true;
  } else {
    $("#divcheck").html("<span style='color:green'> Senhas conferem! </span>");
    document.getElementById("enviarSenha").disabled = false;
  }
}
</script>
