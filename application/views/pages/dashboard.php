<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Receita de Hoje</p>
              <h5 class="font-weight-bolder mb-0">
                R$ 45.320
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="bi bi-currency-dollar text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Vendas Hoje</p>
              <h5 class="font-weight-bolder mb-0">
                1.980
                <span class="text-success text-sm font-weight-bolder">+4%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="bi bi-bag text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Novos Clientes</p>
              <h5 class="font-weight-bolder mb-0">
                3.210
                <span class="text-danger text-sm font-weight-bolder">-1%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="bi bi-person text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Lucro Total</p>
              <h5 class="font-weight-bolder mb-0">
                R$ 102.450
                <span class="text-success text-sm font-weight-bolder">+6%</span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="bi bi-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold">Desenvolvido por</p>
              <h5 class="font-weight-bolder">Painel Administrativo UI</h5>
              <p class="mb-5">Da paleta de cores aos cards, tipografia e elementos complexos, toda a documentação está
                disponível.</p>
              <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                Saiba Mais
                <i class="bi bi-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
            <div class="bg-gradient-primary border-radius-lg h-100">
              <img src="<?= base_url('assets/admin/img/shapes/waves-white.svg') ?>"
                class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
              <div class="position-relative d-flex align-items-center justify-content-center h-100">
                <img class="w-100 position-relative z-index-2 pt-4"
                  src="<?= base_url('assets/admin/img/illustrations/rocket-white.png') ?>" alt="rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
        style="background-image: url('<?= base_url('assets/admin/img/ivancik.jpg') ?>');">
        <span class="mask bg-gradient-dark"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Trabalhe com foguetes</h5>
          <p class="text-white">Criar riqueza é um jogo de soma positiva recente. É sobre quem aproveita a oportunidade
            primeiro.</p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
            Saiba Mais
            <i class="bi bi-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <!-- Card de Usuários Ativos -->
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2">
      <div class="card-body p-3">
        <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
          <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
        </div>
        <h6 class="ms-2 mt-4 mb-0">Usuários Ativos</h6>
        <p class="text-sm ms-2">(<span class="fw-bold">+23%</span>) em relação à semana passada</p>

        <div class="row text-center">
          <!-- Usuários -->
          <div class="col-3 py-3">
            <div class="mb-2 d-flex justify-content-center align-items-center">
              <div
                class="icon icon-xxs bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                <i class="bi bi-people-fill"></i>
              </div>
              <p class="text-xs mt-1 mb-0 fw-bold">Usuários</p>
            </div>
            <h4 class="fw-bold">36K</h4>
            <div class="progress w-75 mx-auto">
              <div class="progress-bar bg-dark w-60" role="progressbar"></div>
            </div>
          </div>

          <!-- Cliques -->
          <div class="col-3 py-3">
            <div class="mb-2 d-flex justify-content-center align-items-center">
              <div
                class="icon icon-xxs bg-info text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                <i class="bi bi-mouse-fill"></i>
              </div>
              <p class="text-xs mt-1 mb-0 fw-bold">Cliques</p>
            </div>
            <h4 class="fw-bold">2m</h4>
            <div class="progress w-75 mx-auto">
              <div class="progress-bar bg-dark w-90"></div>
            </div>
          </div>

          <!-- Vendas -->
          <div class="col-3 py-3">
            <div class="mb-2 d-flex justify-content-center align-items-center">
              <div
                class="icon icon-xxs bg-warning text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                <i class="bi bi-cart-fill"></i>
              </div>
              <p class="text-xs mt-1 mb-0 fw-bold">Vendas</p>
            </div>
            <h4 class="fw-bold">435$</h4>
            <div class="progress w-75 mx-auto">
              <div class="progress-bar bg-dark w-30"></div>
            </div>
          </div>

          <!-- Itens -->
          <div class="col-3 py-3">
            <div class="mb-2 d-flex justify-content-center align-items-center">
              <div
                class="icon icon-xxs bg-danger text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                <i class="bi bi-box-fill"></i>
              </div>
              <p class="text-xs mt-1 mb-0 fw-bold">Itens</p>
            </div>
            <h4 class="fw-bold">43</h4>
            <div class="progress w-75 mx-auto">
              <div class="progress-bar bg-dark w-50"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Visão Geral de Vendas -->
  <div class="col-lg-7">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h6>Visão Geral de Vendas</h6>
        <p class="text-sm">
          <i class="bi bi-arrow-up text-success"></i>
          <span class="fw-bold">4% a mais</span> em 2021
        </p>
      </div>
      <div class="card-body p-3">
        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
      </div>
    </div>
  </div>
</div>

<!--   Core JS Files   -->
<script src="<?= base_url('assets/admin/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/core/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/plugins/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/plugins/smooth-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/plugins/chartjs.min.js') ?>"></script>
<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "#fff",
        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
        maxBarThickness: 6
      },],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
            color: "#fff"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false
          },
          ticks: {
            display: false
          },
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#cb0c9f",
        borderWidth: 3,
        backgroundColor: gradientStroke1,
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      },
      {
        label: "Websites",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#3A416F",
        borderWidth: 3,
        backgroundColor: gradientStroke2,
        fill: true,
        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
        maxBarThickness: 6
      },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#b2b9bf',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#b2b9bf',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/admin/js/soft-ui-dashboard.min.js?v=1.0.7') ?>"></script>