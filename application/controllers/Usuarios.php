<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form'));
		load_base('usuarios');
		$this->load->library('form_validation');
	}
	public function index()
	{	
		set_tema('titulo', 'Login');
		
		set_tema('conteudo', load_conteudo('usuarios', 'cadastra', $data));
		load_template();
	}
	public function cadastro()
	{
		painel();	
		set_tema('titulo', 'Cadastros');
		set_tema('subtitulo','Cadaf');
		set_tema('js',ajax_form('usuarioCadastro','usuarios/cadastroAjax'),false);
		set_tema('conteudo', load_conteudo('usuarios', 'cadastra'));
		load_template();
	}
	public function cadastroAjax(){
		$this->form_validation->set_rules('name', 'Username', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
				'type'=>'danger',
				'title'=>'Error',
				'msg'=>validation_errors(),
				'dados'=>$this->input->post()
				);

			$this->output->set_content_type('application/json')
			->set_output(json_encode($data));
		}
		else
		{
			$data=array(
				'type'=>'success',
				'title'=>'Ok',
				'msg'=>'Passou',
				'dados'=>$this->input->post()
				);
			$this->output->set_content_type('application/json')
			->set_output(json_encode($data));
		}	
		
	}
}
