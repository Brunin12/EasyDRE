<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>


<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url('assets/admin/img/curved-images/curved14.jpg')?>');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Cadastre sua empresa</h1>
          <p class="text-lead text-white">Preencha este pequeno formulário para ter acesso às suas ferramentas.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-5 col-lg-7 col-md-10 mx-auto">
        <div class="card z-index-0 border-2 shadow-md">
          <div class="card-body">
            <form role="form text-left" action="<?= base_url('criar/empresa') ?>" method="post">
              
              <!-- Nome da empresa -->
              <div class="mb-3">
                <label for="nome" class="form-label">Nome da Empresa</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-building"></i></span>
                  <input type="text" class="form-control" placeholder="Digite o nome da empresa" id="nome" name="nome" required>
                </div>
              </div>

              <!-- CPF/CNPJ -->
              <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                  <input type="tel" class="form-control" placeholder="Digite o CPF ou CNPJ" id="cpf_cnpj" name="cpf_cnpj" required>
                </div>
                <small class="text-muted">A máscara será ajustada automaticamente.</small>
              </div>

              <!-- Botão -->
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">
                  Cadastrar Empresa
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function() {
    // Máscara dinâmica para CPF ou CNPJ
    $('#cpf_cnpj').inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true,
        placeholder: '0'
    });
});
</script>
