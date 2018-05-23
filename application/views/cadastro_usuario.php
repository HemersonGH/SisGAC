
<!-- Bootstrap core CSS -->
<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?= base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Novo Usuário </h1>
  </div>

  <div class="col-md-12">
    <form class="form-control" action="<?= base_url(); ?>usuario/cadastrar" method="post">
      <div class="form-group">
        <label for="name"> Nome: </label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="namelHelp" placeholder="Informe o nome..." required>
        <!-- <small id="namelHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="cpf"> CPF: </label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o CPF..." required>
          </div>
        </div>
        <div class="col-md-7">
          <label for="endereco"> Endereço: </label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço..." required>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="nivel"> Nível: </label>
            <select id="nivel" name="nivel" class="form-control" required>
              <option value="0"> ----- </option>
              <option value="1"> Administrador </option>
              <option value="2"> Usuário </option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="email"> Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email..." required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="password"> Senha: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Informe a senha..." required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="status"> Status: </label>
            <select id="status" name="status" class="form-control" required>
              <option value="0"> ----- </option>
              <option value="1"> Ativo </option>
              <option value="2"> Inativo </option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <label for="status"> Cidades: </label>
          <select class="form-control" id="cidade" name="cidade" required>
            <option value="0"> ----- </option>
            <?php foreach ($cidades as $cidade): ?>
              <option value="<?= $cidade->idCidade?> "> <?= $cidade->nome_cid.'-'.$cidade->uf; ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="data"> Data de Nascimento: </label>
            <input type="date" class="form-control" id="data" name="data" required>
          </div>
        </div>
      </div>

      <div style="text-align: right">
        <a type="btn" class="btn btn-secondary" href="<?= base_url(); ?>usuario">Cancelar</a>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>

    </form>
  </div>

</main>
</div>
</div>
