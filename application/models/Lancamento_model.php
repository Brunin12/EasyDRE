<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lancamento_model extends CI_Model
{
  protected $table = 'lancamentos';

  public function get($id = null)
  {
    if ($id) {
      return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    return $this->db->get($this->table)->result();
  }

  public function save($data)
  {
    if (isset($data['id']) && $data['id']) {
      // Atualiza só categoria/valor e descrição
      $update = [
        'tipo' => $data['tipo'],
        'valor' => $data['valor'],
        'descricao' => $data['descricao'] ?? null,
        'data' => $data['data'] ?? date('Y-m-d')
      ];
      $this->db->where('id', $data['id']);
      return $this->db->update($this->table, $update);
    } else {
      // Novo lançamento
      return $this->db->insert($this->table, $data);
    }
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, ['id' => $id]);
  }

  public function get_by_empresa($id_empresa)
  {
    return $this->db
      ->where('id_empresa', $id_empresa)
      ->order_by('data', 'DESC')
      ->get('lancamentos')
      ->result();
  }

}
