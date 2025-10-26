<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visualizar extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");
    }

    public function index()
    {
        $this->load_page('empresa/index', 'Empresa');
    }

    public function perfil()
    {
        $this->load_page('perfil/index', 'Perfil');
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
