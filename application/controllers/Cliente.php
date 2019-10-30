<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Cliente_model');
    }
 
	public function index()
	{
		$this->load->model('Cliente_model');
		$data['clientes'] = $this->Cliente_model->listar_clientes();
		//var_dump($clientes);
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('lista_clientes', $data);
	}

	public function cadastro(){
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('cadastro_cliente');
	}

	public function cadastrar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('razao_social', 'Razão social', 
          'required|max_length[50]');
		$this->form_validation->set_rules('nome_fantasia', 'Nome fantasia', 
          'required|max_length[50]');
		$this->form_validation->set_rules('cnpj', 'CNPJ', 
          'required|max_length[14]');
		$this->form_validation->set_rules('endereco', 'Endereço', 
          'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 
          'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('telefone', 'Telefone', 
          'required|max_length[15]');
		$this->form_validation->set_rules('responsavel', 'Responsável', 
          'required|max_length[60]');
		$this->form_validation->set_rules('cpf', 'CPF', 
          'required|max_length[15]');
		$this->form_validation->set_rules('celular', 'Celular', 
          'required|max_length[20]');

		if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('header');
			$this->load->view('menu');
           $this->load->view('cadastro_cliente', $erros);
     	} else {
           $razao_social = $this->input->post('razao_social');
           $nome_fantasia = $this->input->post('nome_fantasia');
           $cnpj = $this->input->post('cnpj');
           $endereco = $this->input->post('endereco');
           $email = $this->input->post('email');
           $telefone = $this->input->post('telefone');
           $responsavel = $this->input->post('responsavel');
           $cpf = $this->input->post('cpf');
           $celular = $this->input->post('celular');
           if($this->Cliente_model->adicionar($razao_social, $nome_fantasia, $cnpj, $endereco, $email, $telefone, $responsavel, $cpf, $celular)){
           		redirect(base_url());
           }else{
           		echo "Houve um erro no sistema!";
           }
     	}
	}

	public function edicao($id){
		$data['cliente'] = $this->Cliente_model->buscar_cliente($id);

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('edicao_cliente',$data);
	}

	public function editar($id){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('razao_social', 'Razão social', 
          'required|max_length[50]');
		$this->form_validation->set_rules('nome_fantasia', 'Nome fantasia', 
          'required|max_length[50]');
		$this->form_validation->set_rules('cnpj', 'CNPJ', 
          'required|max_length[14]');
		$this->form_validation->set_rules('endereco', 'Endereço', 
          'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 
          'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('telefone', 'Telefone', 
          'required|max_length[15]');
		$this->form_validation->set_rules('responsavel', 'Responsável', 
          'required|max_length[60]');
		$this->form_validation->set_rules('cpf', 'CPF', 
          'required|max_length[15]');
		$this->form_validation->set_rules('celular', 'Celular', 
          'required|max_length[20]');

		if ($this->form_validation->run() == FALSE) {
        	$data = array('mensagens' => validation_errors());
        	$this->load->view('header');
			$this->load->view('menu');
			$data['cliente'] = $this->Cliente_model->buscar_cliente($id);
        	$this->load->view('edicao_cliente',$data);
     	} else {
           $razao_social = $this->input->post('razao_social');
           $nome_fantasia = $this->input->post('nome_fantasia');
           $cnpj = $this->input->post('cnpj');
           $endereco = $this->input->post('endereco');
           $email = $this->input->post('email');
           $telefone = $this->input->post('telefone');
           $responsavel = $this->input->post('responsavel');
           $cpf = $this->input->post('cpf');
           $celular = $this->input->post('celular');
           if($this->Cliente_model->editar($id, $razao_social, $nome_fantasia, $cnpj, $endereco, $email, $telefone, $responsavel, $cpf, $celular)){
           		redirect(base_url());
           }else{
           		echo "Houve um erro no sistema!";
           }
     	}
	}

	public function delete($id){
		if($this->Cliente_model->excluir($id)){
       		redirect(base_url());
       }else{
       		echo "Houve um erro no sistema!";
       }
	}
}
