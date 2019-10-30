<?php
class Proposta_model extends CI_Model {

	public function listar_propostas(){
		$this->db->select('*');
		$this->db->from('tb_proposta');
		$this->db->join('tb_cliente', 'tb_proposta.cd_cliente = tb_cliente.cd_cliente');
		return $this->db->get()->result();

	}

	public function adicionar($cliente, $endereco_obra, $valor_total, $sinal, $qtde_parcelas, $valor_parcelas, $dt_inicio_pag, $dt_parcelas,$arquivo, $status){
		$dados['cd_cliente'] = $cliente;
		$dados['endereco_obra'] = $endereco_obra;
		$dados['valor_total'] = $valor_total;
		$dados['sinal'] = $sinal;
		$dados['qtd_parcelas'] = $qtde_parcelas;
		$dados['valor_parcelas'] = $valor_parcelas;
		$dados['dt_inicio_pag'] = $dt_inicio_pag;
		$dados['dt_parcelas'] = $dt_parcelas;
		$dados['anexo'] = $arquivo;
		$dados['status'] = $status;
		return $this->db->insert('tb_proposta',$dados);
	}

	public function buscar_proposta($id){
		$this->db->select('*');
		$this->db->from('tb_proposta');
		$this->db->where('cd_proposta',$id);
		return $this->db->get()->result_array();
	}

	public function editar($id, $cliente, $endereco_obra, $valor_total, $sinal, $qtde_parcelas, $valor_parcelas, $dt_inicio_pag, $dt_parcelas,$arquivo, $status){
		$dados['cd_cliente'] = $cliente;
		$dados['endereco_obra'] = $endereco_obra;
		$dados['valor_total'] = $valor_total;
		$dados['sinal'] = $sinal;
		$dados['qtd_parcelas'] = $qtde_parcelas;
		$dados['valor_parcelas'] = $valor_parcelas;
		$dados['dt_inicio_pag'] = $dt_inicio_pag;
		$dados['dt_parcelas'] = $dt_parcelas;
		$dados['status'] = $status;

		if(isset($arquivo)){
			$dados['anexo'] = $arquivo;
		}

		$this->db->where('cd_proposta',$id);
		return $this->db->update('tb_proposta',$dados);
	}

	public function excluir($id){
		$this->db->where('cd_proposta',$id);
		return $this->db->delete('tb_proposta');
	}

	public function alterar_status($id, $status){
		$dados['status'] = $status;
		$this->db->where('cd_proposta',$id);
		return $this->db->update('tb_proposta',$dados);
	}

	public function listar_propostas_cliente($id){
		$this->db->select('*');
		$this->db->from('tb_proposta');
		$this->db->join('tb_cliente', 'tb_proposta.cd_cliente = tb_cliente.cd_cliente');
		$this->db->where('tb_proposta.cd_cliente',$id);
		return $this->db->get()->result();

	}
}
?>