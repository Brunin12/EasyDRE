<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empresa_model extends CI_Model
{

    protected $table = 'empresa';
    public function existe_empresa($id_usuario = 0)
    {
        if ($id_usuario == 0) {
            $id_usuario = $this->session->userdata('user')['id'];
        }

        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('empresa')
            ->row_array() !== null;
    }

    public function get_empresa_by_user($id_usuario = 0)
    {
        if ($id_usuario == 0) {
            $id_usuario = $this->session->userdata('user')['id'];
        }

        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('empresa')
            ->row_array();
    }

    public function inserir($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function gerar_dre($empresa)
    {
        $saldo = $empresa->saldo;
        $lucro_liquido = $empresa->lucro_liquido;
        $receita = $empresa->receita;
        $despesa = $empresa->despesa;
        $investimento = $empresa->investimento;

        $margem_lucro = $receita != 0 ? ($lucro_liquido / $receita) * 100 : 0;
        $roi = $investimento != 0 ? ($lucro_liquido / $investimento) * 100 : 0;


        return [
            'saldo' => $saldo,
            'lucro_liquido' => $lucro_liquido,
            'receita' => $receita,
            'despesa' => $despesa,
            'investimento' => $investimento,
            'margem_lucro' => $margem_lucro,
            'roi' => $roi
        ];
    }

    public function gerar_dre_pdf($empresa)
    {
        $this->load->library('tcpdf');
        $pdf = new TCPDF();
        $pdf->AddPage();

        $pdf->SetFillColor(240, 240, 240);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetFontSize(16);
        $pdf->Cell(0, 10, 'Demonstração do Resultado do Exercício', 0, 1, 'C');
        $pdf->SetFontSize(12);

        $saldo = $empresa['saldo'];
        $lucro_liquido = $empresa['lucro_liquido'];
        $receita = $empresa['receita'];
        $despesa = $empresa['despesa'];
        $investimento = $empresa['investimento'];
        $nome = $empresa['nome'];
        $data = date('Y-m-d_H-i-s');

        $margem_lucro = $lucro_liquido != 0 ? number_format(($lucro_liquido / $receita) * 100, 2, ',', '.') : '0,00';
        $roi = $investimento != 0 ? number_format(($lucro_liquido / $investimento) * 100, 2, ',', '.') : '0,00';

        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(80, 10, 'Categoria', 1, 0, 'C', 1);
        $pdf->Cell(80, 10, 'Valor (R$)', 1, 1, 'C', 1);

        $pdf->Cell(80, 10, 'Saldo', 1, 0, 'L');
        $pdf->Cell(80, 10, number_format($saldo, 2, ',', '.'), 1, 1, 'C');

        $pdf->Cell(80, 10, 'Receita', 1, 0, 'L');
        $pdf->Cell(80, 10, number_format($receita, 2, ',', '.'), 1, 1, 'C');

        $pdf->Cell(80, 10, 'Despesas', 1, 0, 'L');
        $pdf->Cell(80, 10, number_format($despesa, 2, ',', '.'), 1, 1, 'C');

        $pdf->Cell(80, 10, 'Margem de lucro', 1, 0, 'L');
        $pdf->Cell(80, 10, $margem_lucro . ' (%)', 1, 1, 'C');

        $pdf->Cell(80, 10, 'R.O.I', 1, 0, 'L');
        $pdf->Cell(80, 10, $roi . ' (%)', 1, 1, 'C');

        $pdf->Output('DRE-' . $nome . '-' . $data . '.pdf', 'D');
    }
}
