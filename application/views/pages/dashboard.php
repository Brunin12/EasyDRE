<div class="container my-5">
  <div class="row mb-4">
    <div class="col-12 text-center">
      <h2>Relatório - <?= ($nome ?? 'Empresa') ?></h2>
      <p class="text-muted">Visualize o desempenho financeiro da sua empresa</p>
    </div>
  </div>

  <div class="row m-1">
    <?php 
    $cards = [
      ['title' => 'Receita total', 'value' => $empresa['receita'], 'text_class' => 'text-success', 'icon' => 'bi-cash-stack', 'extra' => "(ROI): ".number_format($roi,2,',','.')],
      ['title' => 'Lucro Líquido', 'value' => $empresa['lucro_liquido'], 'text_class' => 'text-success', 'icon' => 'bi-currency-dollar', 'extra' => "Lucro: ".number_format($margem_lucro,2, ',', '.').' (%)'],
      ['title' => 'Despesas', 'value' => $empresa['despesa'], 'text_class' => 'text-danger', 'icon' => 'bi-cart', 'extra' => ''],
      ['title' => 'Saldo', 'value' => $empresa['saldo'], 'text_class' => 'text-success', 'icon' => 'bi-piggy-bank-fill', 'extra' => '']
    ];
    ?>
    <?php foreach($cards as $c): ?>
      <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card h-100">
          <div class="card-body p-3 d-flex flex-column justify-content-between">
            <div class="row">
              <div class="col-8">
                <p class="text-sm mb-1 text-capitalize fw-bold"><?= $c['title'] ?></p>
                <h5 class="fw-bolder mb-1">
                  <span class="<?= $c['text_class'] ?>">R$ <?= number_format($c['value'],2,',','.') ?></span>
                </h5>
                <?php if($c['extra']): ?>
                  <p class="text-info text-sm fw-bold mb-0"><?= $c['extra'] ?></p>
                <?php endif; ?>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="bi <?= $c['icon'] ?> text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Indicadores principais -->
  <div class="row text-center mb-5">
    <div class="col-md-3 mb-3">
      <div class="card border-dark shadow-sm">
        <div class="card-body">
          <h6>Saldo</h6>
          <h4>R$ <?= number_format($dre['saldo'], 2, ',', '.') ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card border-dark shadow-sm">
        <div class="card-body">
          <h6>Lucro Líquido</h6>
          <h4>R$ <?= number_format($dre['lucro_liquido'], 2, ',', '.') ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card border-dark shadow-sm">
        <div class="card-body">
          <h6>Margem de Lucro</h6>
          <h4><?= number_format($dre['margem_lucro'], 2) ?>%</h4>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card border-dark shadow-sm">
        <div class="card-body">
          <h6>ROI</h6>
          <h4><?= number_format($dre['roi'], 2) ?>%</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive table-stripped p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor (R$)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Saldo</td>
              <td>
                R$ <?= number_format($dre['saldo'], 2, ',', '.') ?>
              </td>
            </tr>
            <tr>
              <td>Lucro Líquido</td>
              <td>
                R$ <?= number_format($dre['lucro_liquido'], 2, ',', '.') ?>
              </td>
            </tr>
            <tr>
              <td>Receitas</td>
              <td>
                R$ <?= number_format($dre['receita'], 2, ',', '.') ?>
              </td>
            </tr>
            <tr>
              <td>Despesas</td>
              <td>
                R$ <?= number_format($dre['despesa'], 2, ',', '.') ?>
              </td>
            </tr>
            <tr>
              <td>Margem de Lucro</td>
              <td>
                <?= number_format($dre['margem_lucro'], 2, ',', '.') ?> (%)
              </td>
            </tr>
            <tr>
              <td>ROI</td>
              <td>
                <?= number_format($dre['roi'], 2, ',', '.') ?> (%)
              </td>
            </tr>
            <tr>
              <td>Investimento</td>
              <td>
                R$ <?= number_format($dre['investimento'], 2, ',', '.') ?>
              </td>
            </tr>
          </tbody>

        </table>
      </div>
    </div>
  </div>
  <!-- Gráficos -->
  <div class="row mb-5">
    <div class="col-md-6 mb-4">
      <div class="card border-dark shadow-sm p-3">
        <h6 class="text-center">Receita x Despesa x Investimento</h6>
        <canvas id="dreBarChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card border-dark shadow-sm p-3">
        <h6 class="text-center">Distribuição de Lucro</h6>
        <canvas id="drePieChart"></canvas>
      </div>
    </div>
  </div>


  <!-- Botões de exportação -->
  <div class="row mb-5">
    <div class="col text-center">
      <a href="<?= base_url('dre/pdf') ?>" class="btn btn-danger mx-2">Exportar PDF</a>
      <a href="<?= base_url('dre/pdf') ?>" class="btn btn-primary mx-2">Exportar CSV</a>
      <a href="<?= base_url('dre/pdf') ?>" target="_blank" class="btn btn-secondary mx-2">Imprimir</a>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const barCtx = document.getElementById('dreBarChart').getContext('2d');
  new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: ['Receita', 'Despesa', 'Investimento'],
      datasets: [{
        label: 'Valores (R$)',
        data: [<?= $dre['receita'] ?>, <?= $dre['despesa'] ?>, <?= $dre['investimento'] ?>],
        backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
        borderColor: '#000',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: { display: true, text: 'Receita vs Despesa vs Investimento' }
      },
      scales: { y: { beginAtZero: true } }
    }
  });

  const pieCtx = document.getElementById('drePieChart').getContext('2d');
  new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: ['Lucro Líquido', 'Despesas + Investimento'],
      datasets: [{
        data: [<?= $dre['lucro_liquido'] ?>, <?= ($dre['despesa'] + $dre['investimento']) ?>],
        backgroundColor: ['#17a2b8', '#6c757d']
      }]
    },
    options: {
      responsive: true,
      plugins: { title: { display: true, text: 'Distribuição do Lucro' } }
    }
  });

  const gaugeCtx = document.getElementById('financialGauge').getContext('2d');

  // Calculando a saúde financeira como % de ROI ou margem de lucro
  const healthValue = <?= $dre['margem_lucro'] ?>; // ou $dre['roi']

  new Chart(gaugeCtx, {
    type: 'gauge',
    data: {
      datasets: [{
        value: healthValue,
        minValue: 0,
        data: [50, 75, 100], // limites de cores
        backgroundColor: ['#dc3545', '#ffc107', '#28a745'],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false },
        title: { display: true, text: 'Saúde Financeira (%)' }
      }
    }
  });


</script>
