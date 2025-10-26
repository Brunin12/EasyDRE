<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Define um userdata na sessão com SHA1 do título
 */
function set_userdata($titulo, $data) {
    $CI =& get_instance();
    return $CI->session->set_userdata(sha1($titulo), $data);
}

/**
 * Retorna um userdata da sessão usando SHA1 do título
 */
function get_userdata($titulo) {
    $CI =& get_instance();
    return $CI->session->userdata(sha1($titulo));
}

/**
 * Define uma flashdata com SHA1 do título
 */
function set_flashdata($titulo, $data) {
    $CI =& get_instance();
    return $CI->session->set_flashdata(sha1($titulo), $data);
}

/**
 * Retorna uma flashdata
 */
function get_flashdata($titulo) {
    $CI =& get_instance();
    return $CI->session->flashdata(sha1($titulo));
}

/**
 * Retorna o ID do usuário logado
 */
function get_user_id() {
    $CI =& get_instance();
    $user = $CI->session->userdata('user');
    // verifica se está no índice 0 ou direto
    if (isset($user['id'])) {
        return $user['id'];
    } elseif (isset($user[0]['id'])) {
        return $user[0]['id'];
    }
    return null;
}

