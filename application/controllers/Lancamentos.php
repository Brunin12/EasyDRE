<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lancamentos extends MY_Controller
{
  protected $data = [];

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Lancamento_model', 'lancamento');
    $this->load->helper('url');
    $this->load->helper('form');
  }

  public function save()
  {
    $id = $this->get_input('id'); // se vier, atualiza
    $id_empresa = $this->empresa->get_empresa_by_user()['id']; // obrigatório
    $tipo = $this->get_input('tipo');
    $valor = floatval($this->get_input('valor'));
    $descricao = $this->get_input('descricao');
    $data = $this->get_input('data');

    $data_lancamento = [
      'id' => $id ?? null,
      'id_empresa' => $id_empresa,
      'tipo' => $tipo,
      'valor' => $valor,
      'descricao' => $descricao,
      'data' => $data
    ];

    // Salva/atualiza lançamento
    if ($this->lancamento->save($data_lancamento)) {

      // Atualiza os valores na tabela 'empresa' (DRE principal)
      $empresa = $this->db->get_where('empresa', ['id' => $id_empresa])->row();

      if ($empresa) {
        $update = [];

        switch ($tipo) {
          case 'receita':
            $update['receita'] = $empresa->receita + $valor;
            break;
          case 'despesa':
            $update['despesa'] = $empresa->despesa + $valor;
            break;
          case 'investimento':
            $update['investimento'] = $empresa->investimento + $valor;
            break;
          default:
            // Outros tipos não alteram DRE
            break;
        }

        // Atualiza lucro líquido e saldo
        if (!empty($update)) {
          $update['lucro_liquido'] = ($update['receita'] ?? $empresa->receita) -
            (($update['despesa'] ?? $empresa->despesa) +
              ($update['investimento'] ?? $empresa->investimento));
          $update['saldo'] = $empresa->saldo + $valor; // se quiser ajustar saldo também
          $update['updated_at'] = date('Y-m-d H:i:s');

          $this->db->where('id', $id_empresa);
          $this->db->update('empresa', $update);
        }
      }

      $this->session->set_flashdata('success', 'Lançamento salvo e DRE atualizado com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao salvar lançamento.');
    }

    redirect('lancamentos'); // ajuste para sua rota
  }


  // Form de cadastro/edição
  public function form($id = null)
  {
    $data['lancamento'] = $id ? $this->lancamento->get($id) : null;
    $this->load_page('lancamento/form', 'Cadastrar Lançamento');
  }

  // Listagem de lançamentos (opcional)
  public function list()
  {
    // Pega a empresa do usuário logado
    $empresa = $this->empresa->get_empresa_by_user();

    if (!$empresa) {
      $this->session->set_flashdata('error', 'Empresa não encontrada.');
      redirect('/');
    }

    $id_empresa = $empresa['id'];

    // Pega apenas os lançamentos dessa empresa
    $this->data['lancamentos'] = $this->lancamento->get_by_empresa($id_empresa);

    $this->data['empresa'] = $id_empresa;
    $this->load_page('lancamento/list', 'Lista de Lançamentos');
  }

}
