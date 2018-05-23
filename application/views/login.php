<link href="<?= base_url(); ?>assets/css/signin.css" rel="stylesheet">

<div class="col-md-12 text-center">
  <form class="form-signin" action="<?= base_url(); ?>dashboard/logar" method="post">
    <!-- <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <h1 class="h3 mb-3 font-weight-normal"> SGD's UFLA </h1>
    <label for="email" class="sr-only"> Email </label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus> </br>
    <label for="password" class="sr-only"> Password </label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
  </form>

</div>
