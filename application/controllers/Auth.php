<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    protected $data = [];
    protected $page = [];

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("America/Bahia");
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            if ($this->input->method() === 'post') {
                $this->session->set_flashdata('error', 'Erro: ' . validation_errors());
                redirect(base_url('conta/criar'));
            }
            $this->load_page('auth/register', 'Cadastro');
            return;
        }

        $data = [
            'email' => $this->input->post('email'),
            'senha' => sha1($this->input->post('senha')),
            'nome' => $this->input->post('nome'),
            'flag' => 'ATIVO'
        ];

        $id = $this->usuario->inserir($data);

        $this->session->set_userdata('user', ['nome' => $data['nome'], 'id' => $id]);
        redirect(base_url());
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $email = $this->input->post('email');
            $senha = sha1($this->input->post('senha'));
            $data = $this->usuario->login(['email' => $email, 'senha' => $senha]);

            if (isset($data->id_empresa)) {
                $this->session->set_userdata('empresa', [
                    'nome' => $data->nome,
                    'categoria' => $data->categoria,
                    'id_empresa' => $data->id_empresa
                ]);
            }
            redirect(base_url());
        } else {
            $this->load_page('auth/login', 'Entrar');
        }
    }

    public function logout()
    {
        $this->usuario->sair();
    }
}
