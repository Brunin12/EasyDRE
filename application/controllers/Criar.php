<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Criar extends CI_Controller
{
    private array $data = [];
    private array $page = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");

        $this->load->model('empresa');
        $this->load->model('usuario');
        $this->load->library('form_validation');
        $this->load->library('auth');
        $this->load->helper('session'); // helpers get_user_id() e get_empresa_session()
    }

    /** Cadastro de empresa */
    public function empresa()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cpf_cnpj', 'CPF/CNPJ', 'trim|required');

        if ($this->form_validation->run() === false) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->session->set_flashdata('error', 'Erro: ' . validation_errors());
                redirect(base_url('criar/empresa'));
            }
            $this->render_view('Cadastro Empresa', 'cadastro_empresa');
            return;
        }

        $nome = $this->get_input('nome');
        $cpf_cnpj = $this->get_input('cpf_cnpj');

        $id_empresa = $this->empresa->inserir([
            'nome' => $nome,
            'cpf_cnpj' => $cpf_cnpj,
            'flag' => 'ATIVO',
            'id_usuario' => get_user_id(),
        ]);

        $this->usuario->atualiza(['id_empresa' => $id_empresa], ['id' => get_user_id()]);

        $this->session->userdata('empresa')['nome'];
        $this->session->userdata('empresa')['id_empresa'];


        $this->session->set_flashdata('msg', 'Empresa Cadastrada!');
        redirect(base_url());
    }

    /** Criação/atualização do DRE */
    public function dre()
    {
        $this->form_validation->set_rules('saldo', 'Saldo', 'trim|required');
        $this->form_validation->set_rules('despesa', 'Despesa', 'trim|required');
        $this->form_validation->set_rules('receita', 'Receita Total', 'trim|required');
        $this->form_validation->set_rules('investimento', 'Investimento', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('criar/dados_dre'));
        }

        $despesa = floatval($this->get_input('despesa'));
        $receita = floatval($this->get_input('receita'));
        $investimento = floatval($this->get_input('investimento'));
        $saldo = floatval($this->get_input('saldo'));

        // Lucro líquido
        $lucro_liquido = $receita - ($despesa + $investimento);

        $dados = compact('lucro_liquido', 'receita', 'despesa', 'investimento', 'saldo');
        $id_empresa = $this->empresa->get_empresa_by_user()['id_empresa'];
        $this->empresa->atualiza($dados, ['id_empresa' => $id_empresa]);

        $empresa = $this->empresa->get_empresa_id($id_empresa);
        $dre = $this->empresa->gerar_dre($empresa);

        // Correção dos cálculos
        $dre['margem_lucro'] = $receita > 0 ? ($lucro_liquido / $receita) * 100 : 0;
        $dre['roi'] = $investimento > 0 ? ($lucro_liquido / $investimento) * 100 : 0;

        if (!$this->empresa->existe_empresa()) {
            redirect(base_url('visualizar/dre'));
        }

        $this->data['dre'] = $dre;
        $this->render_view('Ver DRE', 'dre/ver');
    }

    /** Página de criação de DRE */
    public function dados_dre()
    {
        $this->render_view('Criando DRE', 'dre/criar');
    }

    /** Exporta DRE em PDF */
    public function dre_pdf()
    {
        $empresa = $this->empresa->get_empresa_by_user();
        $this->empresa->gerar_dre_pdf($empresa);

        redirect(base_url());
    }

    /** Recupera input POST seguro */
    private function get_input(string $name): string
    {
        return addslashes($this->input->post($name) ?? '');
    }

    /** Renderiza views de forma padrão */
    private function render_view(string $titulo, string $view)
    {
        $this->page['titulo'] = $titulo;
        $this->page['css'] = $this->load->view("$view/css", $this->data, true);
        $this->page['js'] = $this->load->view("$view/js", $this->data, true);
        $this->page['content'] = $this->load->view("$view/index", $this->data, true);
        $this->load->view('default/template', ['page' => $this->page]);
    }
}
