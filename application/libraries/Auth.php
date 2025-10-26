<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        // Carrega models necessários
        $this->CI->load->model('Usuario_model', 'usuario');
        $this->CI->load->model('Empresa_model', 'empresa');
    }

    public function se_autenticado() {
        $user = $this->CI->usuario->is_logado() ? $this->CI->session->userdata('user') : null;

        if (!$user) {
            $this->CI->session->set_flashdata('msg', 'Você saiu da sua conta!');
            redirect(base_url('conta/entrar'));
        }

        $user_db = $this->CI->db->get_where('user', ['email' => $user['email']])->row();
        if (!$user_db || $user_db->flag != 'ATIVO') {
            $this->CI->session->unset_userdata('user');
            $this->CI->session->sess_destroy();
            redirect(base_url('conta/entrar'));
        }

        return true;
    }

    public function acesso_id($id) {
        return $this->CI->session->userdata('user_id') == $id;
    }
}
