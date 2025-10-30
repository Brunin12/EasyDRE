<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DRE extends MY_Controller
{
    protected $data = [];
    protected $page = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");
    }

    public function index()
    {
        // Formulário de Cadastro de DRE Instantânea
        $this->data['empresa'] = (object) $this->empresa->get_empresa_by_user();
        $this->load_page('dre/create', 'Gerar DRE Instantânea');
    }

    public function view()
    {
        $dados = $this->empresa->get_empresa_by_user();
        $this->data['dre'] = $this->empresa->gerar_dre((object) $dados);
        $this->data['nome'] = $dados['nome'];
        $this->load_page('dre/view', 'Visualizar DRE Principal');
    }


    public function save()
    {
        $this->form_validation->set_rules('saldo', 'Saldo', 'trim|required');
        $this->form_validation->set_rules('despesa', 'Despesa', 'trim|required');
        $this->form_validation->set_rules('receita', 'Receita Total', 'trim|required');
        $this->form_validation->set_rules('investimento', 'Investimento', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('dre'));
        }

        $despesa = floatval($this->get_input('despesa'));
        $receita = floatval($this->get_input('receita'));
        $investimento = floatval($this->get_input('investimento'));
        $saldo = floatval($this->get_input('saldo'));
        $id_empresa = $this->empresa->get_empresa_by_user()['id'];
        $nome = $this->get_input('nome');

        // Lucro líquido
        $lucro_liquido = $receita - ($despesa + $investimento);

        // Monta objeto/dados
        $dados = [
            'id_empresa' => $id_empresa,
            'saldo' => $saldo,
            'lucro_liquido' => $lucro_liquido,
            'receita' => $receita,
            'despesa' => $despesa,
            'investimento' => $investimento,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Checa se já existe DRE para a empresa (ou registro único)
        //$dre_existente = $this->db->get('dre')->row(); // ajuste se tiver empresa_id

        // if ($dre_existente) {
        // Atualiza DRE existente
        // $this->db->where('id', $dre_existente->id);
        // $this->db->update('dre', $dados);
      
        // Cria novo registro
        $dados['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('dre', $dados);
        

        // Gera DRE instantâneo (sem mexer no DB, apenas cálculo)
        $dre = $this->empresa->gerar_dre((object) $dados);

        if (!$this->empresa->existe_empresa()) {
            redirect(base_url('/'));
        }

        $this->data['dre'] = $dre;
        $this->data['nome'] = $nome;
        $this->load_page('dre/list', 'Ver DRE');
    }


    /** Página de criação de DRE */
    public function show()
    {
        $this->load_page('Criando DRE', 'dre/criar');
    }

    /** Exporta DRE em PDF */
    public function export()
    {
        $empresa = $this->empresa->get_empresa_by_user();
        $this->empresa->gerar_dre_pdf($empresa);

        redirect(base_url());
    }

}
