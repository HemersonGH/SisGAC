<link href="<?= base_url(); ?>assets/css/registrar.css" rel="stylesheet">

<div class="col-md-12 text-center">
  <form class="form-control form-signin" action="<?= base_url(); ?>usuario/cadastrar" method="post">
    <h1 class="h3 mb-3 font-weight-normal"> Registrar </h1>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
    <input type="date" class="form-control" id="data" name="data" required>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
    <select id="tipoUsuario" name="tipoUsuario" class="form-control select" required>
      <option value="1"> Aluno </option>
      <option value="2"> Professor </option>
    </select>
    <div class="row">
      <div class="col-md-6">
        <a type="btn" class="btn btn-danger btn-block" style="cursor:pointer; color: white;" href="<?= base_url(); ?>usuario"> Cancelar </a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary btn-block" style="cursor:pointer;"> Registrar </button>
      </div>
    </div>
  </form>
</div>
