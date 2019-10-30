<?php
class Usuario_model extends CI_Model {

	public function listar_usuarios(){
		$this->db->select('*');
		$this->db->from('tb_usuario');
		return $this->db->get()->result();

	}

	public function adicionar($nome, $email, $senha){
		$dados['nm_usuario'] = $nome;
		$dados['ds_email'] = $email;
		$dados['senha'] = $senha;
		return $this->db->insert('tb_usuario',$dados);
	}

	public function buscar_usuario($id){
		$this->db->select('*');
		$this->db->from('tb_usuario');
		$this->db->where('cd_usuario',$id);
		return $this->db->get()->result_array();
	}

	public function editar($id, $nome, $email, $senha){
		$dados['nm_usuario'] = $nome;
		$dados['ds_email'] = $email;
		$dados['senha'] = $senha;
		$this->db->where('cd_usuario',$id);
		return $this->db->update('tb_usuario',$dados);
	}

	public function excluir($id){
		$this->db->where('cd_usuario',$id);
		return $this->db->delete('tb_usuario');
	}
	
}
?>