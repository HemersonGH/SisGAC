<link href="<?= base_url(); ?>assets/css/registrar.css" rel="stylesheet">

<div class="col-md-12 text-center">
  <form class="form-control form-signin" action="<?= base_url(); ?>usuario/cadastrar" method="post">
    <h1 class="h3 mb-3 font-weight-normal"> Novo Cadastro </h1>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11" required>
    <input type="date" class="form-control" id="data" name="data" data-tooltip="tooltip" title="Data de Nascimento" required>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
    <!-- <input type="password" class="form-control" id="confirmSenha" name="confirmSenha" placeholder="Confirmar Senha" required> -->
    <select id="tipo_usuario" name="tipo_usuario" class="form-control select" required>
      <option value="1"> Aluno </option>
      <option value="2"> Professor </option>
    </select>
    <div class="row">
      <div class="col-md-6">
        <a class="btn btn-danger btn-block" href="<?= base_url(); ?>usuario"> Voltar
        </a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary btn-block mt-2 mt-md-0 ajust"> Cadastrar </button>
      </div>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
  $('[data-tooltip="tooltip"]').tooltip();
});
</script>
