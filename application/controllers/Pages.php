<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{
    protected $data = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");

        // Helpers, models e libraries necessários
        $this->load->model('empresa');
    }


    public function index()
    {
        $user = $this->session->userdata('user'); // pega o array 'user' da sessão

        $id = null; // valor padrão caso não esteja logado
        if ($user && isset($user['id'])) {
            $id = $user['id'];
        }


        if (!$id || !$this->empresa->existe_empresa()) {
            $this->data['empresa'] = null;
            $this->data['margem_lucro'] = 0;
            $this->data['roi'] = 0;
        } else {
            $empresa = $this->empresa->get_empresa_by_user();
            $lucro_liquido = floatval($empresa['lucro_liquido']);
            $receita = floatval($empresa['receita']);
            $investimento = floatval($empresa['investimento']);

            $this->data['empresa'] = $empresa;
            $this->data['margem_lucro'] = $receita > 0 ? ($lucro_liquido / $receita) * 100 : 0;
            $this->data['roi'] = $investimento > 0 ? ($lucro_liquido / $investimento) * 100 : 0;
        }


        $this->load_page('pages/home', 'Início');
    }

    public function about()
    {
        $this->load_page('pages/about', 'Sobre');
    }

    public function dashboard()
    {
        $user = $this->session->userdata('user'); // pega o array 'user' da sessão

        $id = null; // valor padrão caso não esteja logado
        if ($user && isset($user['id'])) {
            $id = $user['id'];
        }


        if (!$id || !$this->empresa->existe_empresa()) {
            $this->data['empresa'] = null;
            $this->data['margem_lucro'] = 0;
            $this->data['roi'] = 0;
        } else {
            $empresa = $this->empresa->get_empresa_by_user();
            $lucro_liquido = floatval($empresa['lucro_liquido']);
            $receita = floatval($empresa['receita']);
            $investimento = floatval($empresa['investimento']);

            $this->data['empresa'] = $empresa;
            $this->data['margem_lucro'] = $receita > 0 ? ($lucro_liquido / $receita) * 100 : 0;
            $this->data['roi'] = $investimento > 0 ? ($lucro_liquido / $investimento) * 100 : 0;
        }
        $dados = $this->empresa->get_empresa_by_user();
        $this->data['dre'] = $this->empresa->gerar_dre((object) $dados);
        $this->data['nome'] = $dados['nome'];
        $this->load_page('pages/dashboard', 'Dashboard');
    }

    public function profile()
    {
        $this->load_page('pages/profile', 'Perfil');
    }
}
