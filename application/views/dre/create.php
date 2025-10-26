<div class="row">
  <div class="col-xl-12 col-lg-8 col-md-10 mx-auto">
    <div class="card z-index-0 border-2 shadow-md">
      <div class="card-header text-center pt-4">
        <h5>Gerar DRE Instantânea - (<?= $empresa->nome ?>)</h5>
        <p>Para gerar sua DRE, preencha os campos para atualizar os dados da sua empresa e depois gere a tabela.</p>
      </div>
      <div class="card-body">

        <?php echo form_open('dre/salvar', ['role' => 'form text-left']); ?>

        <div class="row">
          <!-- Nome da empresa (Opcional) -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('Nome da empresa (Opcional)', 'nome', ['class' => 'text-dark']);
              echo form_input([
                'name' => 'nome',
                'id' => 'nome',
                'class' => 'form-control',
                'placeholder' => 'Nome (Opcional)',
                'value' => isset($empresa->nome) ? $empresa->nome : ''
              ]);
            ?>
          </div>

          <!-- Saldo -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Saldo', 'saldo', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'number',
                'step' => '0.01',
                'min' => '0',
                'name' => 'saldo',
                'id' => 'saldo',
                'class' => 'form-control',
                'placeholder' => 'Saldo',
                'value' => isset($empresa->saldo) ? $empresa->saldo : '',
                'required' => true
              ]);
            ?>
          </div>

          <!-- Despesa Total -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Despesa Total', 'despesa', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'number',
                'step' => '0.01',
                'min' => '0',
                'name' => 'despesa',
                'id' => 'despesa',
                'class' => 'form-control',
                'placeholder' => 'Despesa Total',
                'value' => isset($empresa->despesa) ? $empresa->despesa : '',
                'required' => true
              ]);
            ?>
          </div>

          <!-- Receita Total -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Receita Total', 'receita', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'number',
                'step' => '0.01',
                'min' => '0',
                'name' => 'receita',
                'id' => 'receita',
                'class' => 'form-control',
                'placeholder' => 'Receita Total',
                'value' => isset($empresa->receita) ? $empresa->receita : '',
                'required' => true
              ]);
            ?>
          </div>

          <!-- Investimento Total -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Investimento Total', 'investimento', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'number',
                'step' => '0.01',
                'min' => '0',
                'name' => 'investimento',
                'id' => 'investimento',
                'class' => 'form-control',
                'placeholder' => 'Investimento Total',
                'value' => isset($empresa->investimento) ? $empresa->investimento : '',
                'required' => true
              ]);
            ?>
          </div>
        </div>

        <div class="text-center">
          <?php
            echo form_button([
              'type' => 'submit',
              'class' => 'btn bg-gradient-dark w-100 my-4 mb-2',
              'content' => 'Gerar tabela DRE'
            ]);
          ?>
        </div>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>
