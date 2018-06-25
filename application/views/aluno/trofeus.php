<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/css/img.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-12">
    <h1 class="page-header"> Troféus Obtido </h1>
  </div>

    <div class="col-md-12 text-center">
      <div class="row ">
      <div class="col-md-4 ">
        <span class="fa fa-trophy ouro mr-2" aria-hidden="true" data-tooltip="tooltip" title="Ouro"></span>
        <h4> Ouro </h4>
        <span>
          <h5>
            <?= $this->load->library('application/controllers/aluno')->aluno->get_Trofeus_Ouro($this->session->userdata('idUsuario')); ?>
            trofeu(s) obtido(s)
          </h5>
        </span>
      </div>
      <div class="col-md-4 ">
        <span class="fa fa-trophy prata mr-2" aria-hidden="true" data-tooltip="tooltip" title="Prata"></span>
        <h4> Prata </h4>
        <span>
          <h5>
            <?= $this->load->library('application/controllers/aluno')->aluno->get_Trofeus_Prata($this->session->userdata('idUsuario')); ?>
            trofeu(s) obtido(s)
          </h5>
        </span>
      </div>
      <div class="col-md-4 ">
        <span class="fa fa-trophy bronze" aria-hidden="true" data-tooltip="tooltip" title="Bronze"></span>
        <h4> Bronze </h4>
        <span>
          <h5>
            <?= $this->load->library('application/controllers/aluno')->aluno->get_Trofeus_Bronze($this->session->userdata('idUsuario')); ?>
            trofeu(s) obtido(s)
          </h5>
        </span>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
  });
  </script>

</main>
</div>
</div>
