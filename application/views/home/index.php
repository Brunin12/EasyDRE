<?php if (!empty($empresa)): ?>
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
<?php else: ?>
  <div class="row m-1">
    <div class="col-12">
      <div class="card bg-gradient-info shadow">
        <div class="card-body p-4">
          <h4 class="text-white fw-bolder mb-3">Bem-vindo ao Easy DRE!</h4>
          <p class="text-white mb-2">Aqui você pode gerenciar suas empresas e visualizar o DRE de forma simples.</p>
          <ul class="text-white">
            <li>Crie sua conta ou faça login clicando em "Entrar".</li>
            <li>Cadastre sua empresa em <strong>Cadastro Empresa</strong>.</li>
            <li>Adicione os dados financeiros em <strong>Criar DRE</strong>.</li>
            <li>Visualize seu DRE na página inicial ou gere o PDF.</li>
          </ul>
          <a href="<?= $this->usuario->is_logado() ? base_url('criar/empresa') : base_url('conta/entrar') ?>" 
             class="btn btn-white btn-sm mt-2">
            <?= $this->usuario->is_logado() ? 'Cadastrar Empresa' : 'Entrar ou Criar Conta' ?>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card h-100">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column">
            <h5 class="fw-bolder">Funcionalidades e Praticidade</h5>
            <p class="mb-5">No mundo acelerado dos negócios de hoje, a capacidade de gerenciar eficazmente operações e obter insights valiosos é crucial para o sucesso. O Easy DRE, uma poderosa plataforma desenvolvida em CodeIgniter 3, surge como a solução definitiva para empresas que buscam otimizar suas operações e tomar decisões informadas.</p>
            <a class="text-body text-sm fw-bold mt-auto icon-move-right" href="<?= base_url('home/sobre') ?>">
              Saiba mais
              <i class="bi bi-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
          <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
            <div class="bg-gradient-primary border-radius-lg h-100 position-relative">
              <img src="<?= base_url('assets/admin/img/shapes/waves-white.svg') ?>" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
              <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                <img src="<?= base_url('assets/admin/img/illustrations/rocket-white.png') ?>" class="w-100 pt-4 position-relative z-index-2" alt="rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100 p-3">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url('assets/admin/img/ivancik.jpg') ?>');">
        <span class="mask bg-gradient-dark"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white fw-bolder mb-4 pt-2">O que é o Easy DRE?</h5>
          <p class="text-white">O Easy DRE é uma plataforma robusta projetada especificamente para empresas que desejam consolidar suas operações em um ambiente centralizado e intuitivo. Com uma interface amigável e funcionalidades avançadas, o Easy DRE é a ferramenta definitiva para gestores e empreendedores que buscam um controle eficaz e uma visão aprimorada de suas operações.</p>
          <a class="text-white text-sm fw-bold mt-auto icon-move-right" href="<?= base_url('home/sobre') ?>">
            Saiba mais
            <i class="bi bi-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row m-1 mt-3">
  <div class="col-md-12 mx-auto">
    <div id="carouselExampleIndicators" class="carousel slide rounded" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php 
        $slides = [
          "https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80",
          "https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80",
          "https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
        ];
        foreach($slides as $i => $img): ?>
          <div class="carousel-item <?= $i===0?'active':'' ?>">
            <img src="<?= $img ?>" class="d-block w-100" alt="Slide <?= $i+1 ?>">
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Voltar</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Avançar</span>
      </button>
    </div>
  </div>
</div>
