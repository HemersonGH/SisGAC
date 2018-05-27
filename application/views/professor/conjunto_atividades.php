    <link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

    <div class="padding col-md-12">
      <h5> Atividades </h5>
      <table class="table table-striped paddingTable">
        <tr>
          <th> Nome do Conjunto </th>
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

            </td>
          </tr>
        <?php } ?>
      </table>
    </div>

    </main>
  </div>
</div>
