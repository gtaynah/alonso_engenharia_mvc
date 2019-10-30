<?php
class Cliente_model extends CI_Model {

	public function listar_clientes(){
		$this->db->select('*');
		$this->db->from('tb_cliente');
		return $this->db->get()->result();

	}

	public function adicionar($razao_social, $nome_fantasia, $cnpj, $endereco, $email, $telefone, $responsavel, $cpf, $celular){
		$dados['nm_razao_social'] = $razao_social;
		$dados['nm_fantasia'] = $nome_fantasia;
		$dados['cnpj'] = $cnpj;
		$dados['endereco'] = $endereco;
		$dados['email'] = $email;
		$dados['telefone'] = $telefone;
		$dados['nm_responsavel'] = $responsavel;
		$dados['cpf'] = $cpf;
		$dados['celular'] = $celular;
		return $this->db->insert('tb_cliente',$dados);
	}

	public function buscar_cliente($id){
		$this->db->select('*');
		$this->db->from('tb_cliente');
		$this->db->where('cd_cliente',$id);
		return $this->db->get()->result_array();
	}

	public function editar($id, $razao_social, $nome_fantasia, $cnpj, $endereco, $email, $telefone, $responsavel, $cpf, $celular){
		$dados['nm_razao_social'] = $razao_social;
		$dados['nm_fantasia'] = $nome_fantasia;
		$dados['cnpj'] = $cnpj;
		$dados['endereco'] = $endereco;
		$dados['email'] = $email;
		$dados['telefone'] = $telefone;
		$dados['nm_responsavel'] = $responsavel;
		$dados['cpf'] = $cpf;
		$dados['celular'] = $celular;
		$this->db->where('cd_cliente',$id);
		return $this->db->update('tb_cliente',$dados);
	}

	public function excluir($id){
		$this->db->where('cd_cliente',$id);
		return $this->db->delete('tb_cliente');
	}
}
?>