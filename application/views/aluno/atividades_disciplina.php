<link href="<?= base_url(); ?>assets/css/aluno.css" rel="stylesheet">

<div class="padding col-md-12">

  <?php foreach ($conjuntos_disciplina as $conjuntos_atividades) { ?>
    <div class="spaceBeetwenComponents">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="colorHeader text-center"> Troféus </th>
            <th class="colorHeader text-center"> <?= $conjuntos_atividades->nome_conjunto;?> </th>
            <th class="colorHeader text-center"> Prazo de Entrega </th>
            <th class="colorHeader text-center"> Status </th>
            <th class="colorHeader text-center"> Ações </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->load->library('application/controllers/aluno')->aluno->get_Atividades($conjuntos_atividades->idConjuntoAtividade) as $atividade) { ?>
            <tr>
              <td class="text-center">
                <?php if ($atividade->trofeu_ouro == 0 && $atividade->trofeu_prata == 0 && $atividade->trofeu_bronze == 0): ?>
                  Sem Troféus
                <?php endif; ?>
                <?php if ($atividade->trofeu_ouro == 1): ?>
                  <span class="fa fa-trophy ouro mr-2" aria-hidden="true" data-tooltip="tooltip" title="Ouro"></span>
                <?php endif; ?>
                <?php if ($atividade->trofeu_prata == 1): ?>
                  <span class="fa fa-trophy prata mr-2" aria-hidden="true" data-tooltip="tooltip" title="Prata"></span>
                <?php endif; ?>
                <?php if ($atividade->trofeu_bronze == 1): ?>
                  <span class="fa fa-trophy bronze" aria-hidden="true" data-tooltip="tooltip" title="Bronze"></span>
                <?php endif; ?>
              </td>
              <td class="text-center"> <?= $atividade->nome_atividade; ?> </td>
              <td class="text-center"> <?= str_replace("-", "/", date('d-m-Y', strtotime($atividade->prazo_entrega))); ?> </td>
              <td class="text-center">
                <?=
                  $this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario')) == 1 ? 'Pendente':
                  ($this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario')) == 2 ? 'Aguardando Avaliação':
                  ($this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario')) == 3 ? 'Recusada':'Aceita'));
                ?>
              </td>
              <td class="text-center">
                <?php if ($this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario')) != 1): ?>
                  <span class="fa fa-paper-plane color_disabled mr-2" aria-hidden="true" data-tooltip="tooltip" title="Atividade já realizada"></span>
                <?php else: ?>
                  <a data-tooltip="tooltip" title="Enviar atividade" href="<?= base_url('aluno/enviar_atividade/'.$atividade->idAtividade); ?>">
                    <span class="fa fa-paper-plane paper_plane mr-2" aria-hidden="true"></span>
                  </a>
                <?php endif; ?>
                <?php if ( ($this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario') ) == 1) ||
                  ($this->load->library('application/controllers/aluno')->aluno->get_Status_Atividade($atividade->idAtividade, $this->session->userdata('idUsuario') ) == 4)): ?>
                  <span class="fa fa-pencil color_disabled mr-2" aria-hidden="true" data-tooltip="tooltip" title="Edição bloqueada"></span>
                <?php else: ?>
                  <a data-tooltip="tooltip" title="Editar envio" href="<?= base_url('aluno/atualizar_atividade_realizada/'.$atividade->idAtividade); ?>">
                    <span class="fa fa-pencil pencil mr-2" aria-hidden="true"></span>
                  </a>
                <?php endif; ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>
  <script>
  $(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
  });
  </script>
</div>
</main>
</div>
</div>
