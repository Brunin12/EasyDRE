<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function get_usuario($data)
    {
        return $this->db->get_where('usuario', $data)->row();
    }

    public function get_usuario_id($id)
    {
        return $this->db->get_where('usuario', ['id' => $id])->row();
    }

    public function inserir($data)
    {
        $this->db->insert('usuario', $data);
        return $this->db->insert_id();
    }

    public function atualiza($data, $where)
    {
        $this->db->update('usuario', $data, $where);
    }

    public function login($form)
    {
        $user = $this->get_usuario($form);
        if ($user && $user->flag === 'ATIVO') {
            $this->session->set_userdata('user', [
                'id' => $user->id,
                'nome' => $user->nome,
                'email' => $user->email
            ]);
            $this->session->set_flashdata("msg", "Entrou com sucesso");
            return $user;
        }

        $this->session->set_flashdata("error", "Nenhum usuário ativo foi encontrado.");
        redirect(base_url('entrar'));
    }

    public function is_logado()
    {
        return $this->session->userdata('user') ? true : false;
    }

    public function sair()
    {
        // Remove o usuário da sessão e destrói a sessão
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();

        // Checa se o usuário ainda está logado
        if ($this->session->userdata('user')) {
            $this->session->set_flashdata(
                'error',
                'Um erro aconteceu, usuário não fez o logoff. Tente novamente mais tarde.'
            );
            redirect(base_url());
            exit;
        }

        // Se chegou aqui, usuário já deslogou
        redirect('entrar'); // redireciona para login ou página inicial
    }

}
