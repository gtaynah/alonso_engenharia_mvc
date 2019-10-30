<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposta extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Proposta_model');
    }
 
	public function index()
	{
		$this->load->model('Proposta_model');
		$data['propostas'] = $this->Proposta_model->listar_propostas();
		//var_dump($clientes);
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('lista_propostas', $data);
	}

	public function cadastro(){
    $this->load->model('Cliente_model');
    $data['clientes'] = $this->Cliente_model->listar_clientes();
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('cadastro_proposta',$data);
	}

	public function cadastrar(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('cliente', 'Cliente', 'required');
    $this->form_validation->set_rules('endereco_obra', 'Endereço da obra', 'required|max_length[70]');
    $this->form_validation->set_rules('valor_total', 'Valor total', 'required|max_length[20]');
    $this->form_validation->set_rules('sinal', 'Sinal', 'required|max_length[20]');
    $this->form_validation->set_rules('qtde_parcelas', 'Qtde de parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('valor_parcelas', 'Valor das parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('dt_inicio_pag', 'Início do pagamento', 'required|max_length[20]');
    $this->form_validation->set_rules('dt_parcelas', 'Data das parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('status', 'Status', 'required|max_length[20]');

    if ($this->form_validation->run() == FALSE) {
          $erros = array('mensagens' => validation_errors());
          $this->load->view('header');
          $this->load->view('menu');
          $this->load->view('cadastro_proposta', $erros);
    } else {
         $cliente = $this->input->post('cliente');
         $endereco_obra = $this->input->post('endereco_obra');
         $valor_total = $this->input->post('valor_total');
         $sinal = $this->input->post('sinal');
         $qtde_parcelas = $this->input->post('qtde_parcelas');
         $valor_parcelas = $this->input->post('valor_parcelas');
         $dt_inicio_pag = $this->input->post('dt_inicio_pag');
         $dt_parcelas = $this->input->post('dt_parcelas');
         $status = $this->input->post('status');
         $anexo = $_FILES['anexo'];
         
         //Upload arquivo
         if(isset($anexo)){
            $configuracao = array(
                            'upload_path'   => 'assets/uploads/',
                            'allowed_types' => 'pdf',
                            'file_name'     => $cliente.date("_Ymd_His").'.pdf',
                            'max_size'      => '500'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            if ($this->upload->do_upload('anexo')){
              $arquivo = $cliente.date("_Ymd_His").'.pdf';
            }
            else{
              echo $this->upload->display_errors();
            }
         }
         
         
         if($this->Proposta_model->adicionar($cliente, $endereco_obra, $valor_total, $sinal, $qtde_parcelas, $valor_parcelas, $dt_inicio_pag, $dt_parcelas,$arquivo, $status)){
            redirect(base_url().'index.php/proposta');
         }else{
            echo "Houve um erro no sistema!";
         }
    }
	}

	public function edicao($id){
    $this->load->model('Cliente_model');
    $data['clientes'] = $this->Cliente_model->listar_clientes();
		$data['proposta'] = $this->Proposta_model->buscar_proposta($id);

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('edicao_proposta',$data);
	}

	public function editar($id){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('cliente', 'Cliente', 'required');
    $this->form_validation->set_rules('endereco_obra', 'Endereço da obra', 'required|max_length[70]');
    $this->form_validation->set_rules('valor_total', 'Valor total', 'required|max_length[20]');
    $this->form_validation->set_rules('sinal', 'Sinal', 'required|max_length[20]');
    $this->form_validation->set_rules('qtde_parcelas', 'Qtde de parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('valor_parcelas', 'Valor das parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('dt_inicio_pag', 'Início do pagamento', 'required|max_length[20]');
    $this->form_validation->set_rules('dt_parcelas', 'Data das parcelas', 'required|max_length[20]');
    $this->form_validation->set_rules('status', 'Status', 'required|max_length[20]');

    if ($this->form_validation->run() == FALSE) {
          $data = array('mensagens' => validation_errors());
          $this->load->model('Cliente_model');
          $data['clientes'] = $this->Cliente_model->listar_clientes();
          $data['proposta'] = $this->Proposta_model->buscar_proposta($id);
          $this->load->view('header');
          $this->load->view('menu');
          $this->load->view('edicao_proposta', $data);
    } else {
         $cliente = $this->input->post('cliente');
         $endereco_obra = $this->input->post('endereco_obra');
         $valor_total = $this->input->post('valor_total');
         $sinal = $this->input->post('sinal');
         $qtde_parcelas = $this->input->post('qtde_parcelas');
         $valor_parcelas = $this->input->post('valor_parcelas');
         $dt_inicio_pag = $this->input->post('dt_inicio_pag');
         $dt_parcelas = $this->input->post('dt_parcelas');
         $status = $this->input->post('status');
         $anexo = $_FILES['anexo'];
         
         //Upload arquivo
         if(isset($anexo)){
            $configuracao = array(
                            'upload_path'   => 'assets/uploads/',
                            'allowed_types' => 'pdf',
                            'file_name'     => $cliente.date("_Ymd_His").'.pdf',
                            'max_size'      => '500'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            if ($this->upload->do_upload('anexo')){
              $arquivo = $cliente.date("_Ymd_His").'.pdf';
            }
            else{
              echo $this->upload->display_errors();
            }
         }
         
         
         if($this->Proposta_model->editar($id, $cliente, $endereco_obra, $valor_total, $sinal, $qtde_parcelas, $valor_parcelas, $dt_inicio_pag, $dt_parcelas,$arquivo, $status)){
            redirect(base_url().'index.php/proposta');
         }else{
            echo "Houve um erro no sistema!";
         }
    }
	}

	public function delete($id){
		if($this->Proposta_model->excluir($id)){
       		redirect(base_url().'index.php/proposta');
       }else{
       		echo "Houve um erro no sistema!";
       }
	}

  public function alterar_status(){
    $id = $_POST['cod'];
    $status = $_POST['status'];

    if($status==1) { $status=0; }
    else { $status=1; }

    if($this->Proposta_model->alterar_status($id,$status)){
          redirect(base_url().'index.php/proposta');
       }else{
          echo "Houve um erro no sistema!";
       }
  }

  public function lista_propostas_cliente($id){
    $this->load->model('Proposta_model');
    $data['propostas'] = $this->Proposta_model->listar_propostas_cliente($id);
    //var_dump($clientes);
    $this->load->view('header');
    $this->load->view('menu');
    $this->load->view('lista_propostas', $data);
  }
}
