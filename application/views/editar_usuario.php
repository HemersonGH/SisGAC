
<!-- Bootstrap core CSS -->
<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?= base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

<script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js "></script>
<script src="<?= base_url(); ?>assets/maxcdn/maxcdn.min.js "></script>

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Atualizar Usuário</h1>
  </div>

  <div class="col-md-12">
    <form class="form-control" action="<?= base_url(); ?>usuario/salvar_atualizacao" method="post">
      <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $usuario[0]->nome; ?>" required>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario[0]->cpf; ?>" required>
          </div>
        </div>
        <div class="col-md-7">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $usuario[0]->endereco; ?>" required>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="nivel">Nível:</label>
            <select id="nivel" name="nivel" class="form-control" required>
              <option value="0"> ----- </option>
              <option value="1" <?= $usuario[0]->nivel == 1? 'selected':''; ?> > Administrador </option>
              <option value="2" <?= $usuario[0]->nivel == 2? 'selected':''; ?> > Usuário </option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario[0]->email; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="button" class="btn btn-default btn-block" value="Atualizar Senha"
            data-toggle="modal" data-target="#myModal">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
              <option value="0"> ----- </option>
              <option value="1" <?= $usuario[0]->status == 1? 'selected':''; ?>  > Ativo </option>
              <option value="2" <?= $usuario[0]->status == 2? 'selected':''; ?>  > Inativo </option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <label for="status"> Cidades: </label>
          <select class="form-control" id="cidade" name="cidade" required>
            <option value="0"> ----- </option>
            <?php foreach ($cidades as $cidade) :
              if ($cidade->idCidade == $usuario[0]->cidade_idCidade) {
                ?>
                <option value=" <?= $cidade->idCidade ?> " selected> <?= $cidade->nome_cid.'-'.$cidade->uf; ?> </option>
              <?php } else { ?>
                <option value=" <?= $cidade->idCidade ?> "> <?= $cidade->nome_cid.'-'.$cidade->uf; ?> </option>
              <?php } endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="data"> Data de Nascimento: </label>
              <input type="date" class="form-control" id="data" name="data" value="<?= date('Y-m-d', strtotime($usuario[0]->dataNasc)); ?>" required>
            </div>
          </div>
        </div>
        <div style="text-align: right">
          <a type="btn" class="btn btn-secondary" href="<?= base_url(); ?>usuario" >Cancelar</a>
          <button type="submit" class="btn btn-success">Atualizar</button>
        </div>

      </form>
    </div>

  </main>
</div>
</div>

<!-- Modal -->
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
