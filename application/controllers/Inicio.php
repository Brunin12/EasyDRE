<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");

        // Helpers, models e libraries necessários
        $this->load->helper('session');
        $this->load->model('empresa');
        $this->load->library('auth');
    }

    public function index()
    {
        $id = get_user_id(); // helper session        

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


        $this->load_page('home/index', 'Início');
    }

    public function sobre()
    {
        $this->load_page('sobre/index', 'Sobre');
    }

    public function dashboard()
    {
        $this->load_page('dashboard/index', 'Dashboard');
    }

    /**
     * Carrega template padrão
     */
    private function load_page($view, $titulo)
    {
        $page = [
            'titulo' => $titulo,
            'css' => $this->load->view(str_replace('index', 'css', $view), $this->data, true),
            'js' => $this->load->view(str_replace('index', 'js', $view), $this->data, true),
            'content' => $this->load->view($view, $this->data, true)
        ];

        $this->load->view('default/template', ['page' => $page]);
    }

    /**
     * Retorna valor de input POST
     */
    private function get_input($name)
    {
        return addslashes(trim($this->input->post($name) ?? ''));
    }
}
