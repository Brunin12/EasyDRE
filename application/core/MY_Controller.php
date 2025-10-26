<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe BaseController
 * 
 * Controlador base para todos os outros controllers.
 * Centraliza métodos úteis como carregamento de templates e sanitização de input.
 */
class MY_Controller extends CI_Controller
{
    protected $data = [];

    public function __construct()
    {
        parent::__construct();
        // Carrega helpers e libs comuns a todos os controladores
       
    }

    /**
     * Carrega template padrão
     * 
     * @param string $view   Caminho da view principal (ex: 'dre/index')
     * @param string $titulo Título da página
     */
    protected function load_page($view, $titulo)
    {
        $this->data['titulo'] = $titulo;

        $page = [
            'titulo'  => $titulo,
            'content' => $this->load->view($view, $this->data, TRUE)
        ];

        $this->load->view('default/template', ['page' => $page]);
    }

    /**
     * Retorna valor de input POST sanitizado
     * 
     * @param string $name Nome do campo
     * @return string Valor tratado
     */
    protected function get_input($name)
    {
        $value = $this->input->post($name);
        return $value !== NULL ? addslashes(trim($value)) : '';
    }
}
