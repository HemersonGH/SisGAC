    <link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

    <div class="padding col-md-12">
      <h5> Atividades </h5>
      <table class="table table-striped paddingTable">
        <tr>
          <th> Nome do Atividade </th>
          <th> Prazo </th>
          <th> Valor </th>
          <th> Ações </th>
        </tr>
        <?php foreach ($atividades as $atividade) { ?>
          <tr>
            <td> <?= $atividade->nome_atividade; ?> </td>
            <td> <?= date('d-m-Y', strtotime($atividade->prazo_entrega)); ?> </td>
            <td> <?= $atividade->pontos; ?> </td>
            <td>
              <a title="Editar atividade" href="<?= base_url('professor/atualizar_atividade/'.$atividade->idAtividade); ?>">
                <span class="fa fa-pencil color_pencil mr-1" aria-hidden="true"></span>
              </a>
              <a title="Excluir atividade" href="<?= base_url('professor/excluir_atividades/'.$atividade->idAtividade.'/'.$atividade->idConjuntoAtividade); ?>" onclick="return confirm('Deseja realmente remover essa atividade?'); ">
                <span class="fa fa-remove remove " aria-hidden="true"></span>
              </a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>

    </main>
  </div>
</div>
