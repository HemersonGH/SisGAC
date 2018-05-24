<link href="<?= base_url(); ?>assets/css/signin.css" rel="stylesheet">

<div class="col-md-12 text-center">
  <form class="form-signin" action="<?= base_url(); ?>pagPrincipal/logar" method="post">
    <h1 class="h3 mb-3 font-weight-normal"> SGD's UFLA </h1>
    <label for="email" class="sr-only"> Email </label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus> </br>
    <label for="password" class="sr-only"> Password </label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> </br>
    <a href="<?= base_url(); ?>usuario/registrar"> Registrar </a>
  </form>
</div> <!-- Essa div fecha a div do login "<div class="col-md-12 text-center">" -->


<main class="col-md-12 text-center form-signin">
  <div class="alert alert-success" role="alert">
    <strong> Teste teste teste Teste teste teste </strong>
  </div>
</main>
