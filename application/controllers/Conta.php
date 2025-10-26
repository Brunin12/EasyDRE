<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Conta extends CI_Controller
{
    private $data = [];
    private $page = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(['form_validation', 'session']);
    }

    public function criar()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            if ($this->input->method() === 'post') {
                $this->session->set_flashdata('error', 'Erro: ' . validation_errors());
                redirect(base_url('conta/criar'));
            }
            $this->load_page('Cadastro', 'cadastro');
            return;
        }

        $data = [
            'email' => $this->get_input('email'),
            'senha' => sha1($this->get_input('senha')),
            'nome' => $this->get_input('nome'),
            'flag' => 'ATIVO'
        ];

        $id = $this->usuario->inserir($data);

        $this->session->set_userdata('user', ['nome' => $data['nome'], 'id' => $id]);
        redirect(base_url());
    }

    public function entrar()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $email = $this->get_input('email');
            $senha = sha1($this->get_input('senha'));
            $data = $this->usuario->login(['email' => $email, 'senha' => $senha]);

            if (isset($data->id_empresa)) {
                $this->session->set_userdata('empresa', [
                    'nome' => $data->nome,
                    'cpf_cnpj' => $data->cpf_cnpj,
                    'id_empresa' => $data->id_empresa
                ]);
            }
            redirect(base_url());
        } else {
            $this->load_page('Entrar', 'login');
        }
    }

    public function sair()
    {
        $this->usuario->sair();
    }

    private function get_input($name)
    {
        return addslashes($this->input->post($name) ?? '');
    }

    private function load_page($titulo, $folder)
    {
        $this->page['titulo'] = $titulo;
        $this->page['css'] = $this->load->view("$folder/css", $this->data, true);
        $this->page['js'] = $this->load->view("$folder/js", $this->data, true);
        $this->page['content'] = $this->load->view("$folder/index", $this->data, true);
        $this->load->view('default/template', ['page' => $this->page]);
    }
}
