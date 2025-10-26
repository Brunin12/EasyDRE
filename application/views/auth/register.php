<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
    style="background-image: url('<?= base_url('assets/admin/img/curved-images/curved14.jpg') ?>');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Bem vindo!</h1>
          <p class="text-lead text-white">
            Preencha este pequeno formulário e desfrute do nosso site por tempo ilimitado!
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-5 col-lg-7 col-md-10 mx-auto">
        <div class="card z-index-0 border-2 shadow-md">
          <div class="card-header text-center pt-4">
            <h5>Continuar com</h5>
          </div>

          <div class="row px-xl-5 px-sm-4 px-3">
            <div class="col-3 ms-auto px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
              <i class="bi bi-google text-dark fs-3"></i>
              </a>
            </div>

            <div class="col-3 px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                <i class="bi bi-apple text-dark fs-3"></i>
              </a>
            </div>

            <div class="col-3 me-auto px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                <i class="bi bi-facebook text-danger fs-3"></i>
              </a>
            </div>

            <div class="mt-2 position-relative text-center">
              <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                ou
              </p>
            </div>
          </div>

          <div class="card-body">
            <form role="form text-left" action="<?= base_url('cadastro') ?>" method="post">

              <!-- Nome -->
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome" name="nome" required>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
              </div>

              <!-- Senha -->
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Senha" name="senha" required>
              </div>

              <!-- Nome da Empresa -->
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome da Empresa" name="empresa_nome" required>
              </div>

              <!-- Tipo de Empresa -->
              <div class="mb-3">
                <select class="form-control" name="empresa_tipo" required>
                  <option value="" selected disabled>Selecionar tipo de empresa</option>
                  <option value="MEI">Microempreendedor Individual (MEI)</option>
                  <option value="LTDA">Sociedade Limitada (LTDA)</option>
                  <option value="EIRELI">Empresa Individual de Responsabilidade Limitada (EIRELI)</option>
                  <option value="SA">Sociedade Anônima (S/A)</option>
                  <option value="Cooperativa">Cooperativa</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>

              <!-- Botão -->
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cadastrar Conta</button>
              </div>

              <p class="text-sm mt-3 mb-0">
                Já tem conta?
                <a href="<?= base_url('entrar') ?>" class="text-dark font-weight-bolder">Entrar</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
