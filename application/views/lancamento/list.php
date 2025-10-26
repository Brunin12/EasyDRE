<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5>Lançamentos da Empresa</h5>
      </div>
      <div class="card-body">
        <div class="card  text-white table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor (R$)</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($lancamentos)): ?>
                <?php foreach ($lancamentos as $lanc): ?>
                  <tr>
                    <td><?= date('d/m/Y', strtotime($lanc->data)) ?></td>
                    <td><?= ($lanc->descricao) ?></td>
                    <td><?= ucfirst($lanc->tipo) ?></td>
                    <td><?= number_format($lanc->valor, 2, ',', '.') ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center">Nenhum lançamento encontrado.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>