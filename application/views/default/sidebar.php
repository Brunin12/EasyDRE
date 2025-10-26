<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="<?= base_url() ?>">
      <img src="<?= base_url('assets/site/favicon-32x32.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Easy DRE</span>
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  <div class="collapse navbar-collapse w-auto h-100 overflow-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- Início -->
      <li class="nav-item">
        <a class="nav-link active info" href="<?= base_url() ?>">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;">
            <i class="bi bi-house-fill text-white fs-5"></i>
          </div>
          <span class="nav-link-text ms-1">Início</span>
        </a>
      </li>

      <?php if ($this->usuario->is_logado() && $this->empresa->existe_empresa()): ?>
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('relatorio') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-speedometer2 text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Relatório</span>
          </a>
        </li>

        <!-- Visualizar DRE -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('dre/principal') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-file-earmark-text-fill text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Ver DRE Principal</span>
          </a>
        </li>

        <!-- Cadastrar lançamento -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('lancamento/novo') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-database-fill-add text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Fazer Lançamento</span>
          </a>
        </li>

        <!-- Cadastrar lançamento -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('lancamentos') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-clipboard2-data-fill text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Listar Lançamentos</span>
          </a>
        </li>        

        <!-- Criar DRE -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('dre') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-file-earmark-plus-fill text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">DRE Instantâneo</span>
          </a>
        </li>        


        <!-- Seção Perfil -->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Sobre o Perfil</h6>
        </li>

        <!-- Meu Perfil -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('perfil') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-person-fill text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Meu Perfil</span>
          </a>
        </li>

        <!-- Sair -->
        <li class="nav-item">
          <a class="nav-link active info" href="<?= base_url('sair') ?>">
            <div
              class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
              style="width:40px; height:40px;">
              <i class="bi bi-box-arrow-right text-white fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Sair</span>
          </a>
        </li>
      <?php endif; ?>

    </ul>
  </div>

  <div class="sidenav-footer mx-3">
    <?php if (!$this->usuario->is_logado()): ?>
      <a class="btn bg-gradient-primary mt-3 w-100" href="<?= base_url('entrar') ?>">Entrar</a>
    <?php endif; ?>
  </div>
</aside>