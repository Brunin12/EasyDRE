<div class="row">
  <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
    <div class="card z-index-0 border-2 shadow-md">
      <div class="card-header text-center pt-4">
        <h5>Cadastrar Lançamento</h5>
        <p>Preencha os dados abaixo para registrar um lançamento que será incluído no DRE.</p>
      </div>
      <div class="card-body">

        <?php echo form_open('lancamentos/salvar', ['role' => 'form text-left']); ?>

        <div class="row">
          <!-- Tipo de lançamento -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Tipo de Lançamento', 'tipo', ['class' => 'text-dark']);
              echo form_dropdown('tipo', [
                '' => 'Selecionar',
                'receita' => 'Receita',
                'despesa' => 'Despesa',
                'investimento' => 'Investimento',
                'outro' => 'Outro'
              ], '', [
                'class' => 'form-control',
                'id' => 'tipo',
                'required' => true
              ]);
            ?>
          </div>

          <!-- Valor -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Valor (R$)', 'valor', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'number',
                'step' => '0.01',
                'min' => '0',
                'name' => 'valor',
                'id' => 'valor',
                'class' => 'form-control',
                'placeholder' => 'Valor do lançamento',
                'required' => true
              ]);
            ?>
          </div>

          <!-- Descrição -->
          <div class="col-md-12 mb-3">
            <?php
              echo form_label('Descrição', 'descricao', ['class' => 'text-dark']);
              echo form_textarea([
                'name' => 'descricao',
                'id' => 'descricao',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Descrição opcional do lançamento'
              ]);
            ?>
          </div>

          <!-- Data -->
          <div class="col-md-6 mb-3">
            <?php
              echo form_label('<span class="text-danger">*</span> Data', 'data', ['class' => 'text-dark']);
              echo form_input([
                'type' => 'date',
                'name' => 'data',
                'id' => 'data',
                'class' => 'form-control',
                'value' => date('Y-m-d'),
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
              'content' => 'Salvar Lançamento'
            ]);
          ?>
        </div>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>
