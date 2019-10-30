<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }
 
	public function index()
	{
		$data['usuarios'] = $this->Usuario_model->listar_usuarios();
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('lista_usuarios', $data);
	}

	public function cadastro(){
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('cadastro_usuario');
	}

  public function cadastrar(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nome', 'Nome', 
          'required|max_length[60]');
    $this->form_validation->set_rules('email', 'Email', 
          'required|max_length[50]|valid_email');
    $this->form_validation->set_rules('senha', 'Senha', 
          'required|max_length[20]',array('required' => 'Você deve preencher a %s.'));
    $this->form_validation->set_rules('confirme_senha', 'Confirmação de Senha', 
           'required|matches[senha]');

    if ($this->form_validation->run() == FALSE) {
          $erros = array('mensagens' => validation_errors());
          $this->load->view('header');
          $this->load->view('menu');
          $this->load->view('cadastro_usuario', $erros);
      } else {
           $nome = $this->input->post('nome');
           $email = $this->input->post('email');
           $senha = $this->input->post('senha');
           $senha = md5($senha);
           if($this->Usuario_model->adicionar($nome, $email, $senha)){
              redirect(base_url().'index.php/usuario');
           }else{
              echo "Houve um erro no sistema!";
           }
      }
  }

  public function edicao($id){
    $data['usuario'] = $this->Usuario_model->buscar_usuario($id);

    $this->load->view('header');
    $this->load->view('menu');
    $this->load->view('edicao_usuario',$data);
  }

  public function editar($id){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nome', 'Nome', 
          'required|max_length[60]');
    $this->form_validation->set_rules('email', 'Email', 
          'required|max_length[50]|valid_email');
    $this->form_validation->set_rules('senha', 'Senha', 
          'required|max_length[20]',array('required' => 'Você deve preencher a %s.'));
    $this->form_validation->set_rules('confirme_senha', 'Confirmação de Senha', 
           'required|matches[senha]');

    if ($this->form_validation->run() == FALSE) {
          $data = array('mensagens' => validation_errors());
          $this->load->view('header');
          $this->load->view('menu');
          $data['usuario'] = $this->Usuario_model->buscar_usuario($id);
          $this->load->view('edicao_usuario', $data);
      } else {
          $nome = $this->input->post('nome');
          $email = $this->input->post('email');
          $senha = $this->input->post('senha');
          $senha_atual = $this->input->post('senha_atual');
          if ($senha != $senha_atual){
            $senha = md5($senha);
          }
          if($this->Usuario_model->editar($id, $nome, $email, $senha)){
            redirect(base_url().'index.php/usuario');
          }else{
            echo "Houve um erro no sistema!";
          }
      }
  }

  public function delete($id){
    if($this->Usuario_model->excluir($id)){
          redirect(base_url().'index.php/usuario');
       }else{
          echo "Houve um erro no sistema!";
       }
  }

}
