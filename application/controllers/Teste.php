<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	public function __construct() {
		parent::__construct();
		set_tema('template', 'teste');
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{	
		$A=$this->uri->segment(3);
		set_tema('teste', teemo($A));
		load_template();
	}
	public function emprestimo(){
		$this->load->model('Emprestimo','emp');
		$this->emp->setSituacao(1,1);
		//$this->emp->registar('2016-10-11','2016-10-13',4,4,'O youtube ensina basta estudar');
		$a=$this->emp->getEmprestimo(0)->result_array();
		debugPrint($a,'getEmprestimo(0)');
		$a=$this->emp->getEmprestimo()->result_array();
		debugPrint($a,'getEmprestimo()');
		$b=$this->emp->getById(2)->result_array();
		debugPrint($b,'getById(2)');
		$b=$this->emp->getByVencidos()->result_array();
		debugPrint($b,'getByVencidos()');
		$b=$this->emp->getByVencidos('2016-10-10')->result_array();
		debugPrint($b,'getByVencidos()');

	}
	public function reserva(){
		$this->load->model('Reserva','res');
		$this->res->setSituacao(1,1);
		//$this->res->registar('2016-10-11','2016-10-13',4,4,'O youtube ensina basta estudar');
		$a=$this->res->getReserva()->result_array();
		debugPrint($a);
		$b=$this->res->getById(1)->result_array();
		debugPrint($b);
	}
	public function livros(){
		$dados=array(
			'titulo'=>'Estude',
    		'edicao'=>'01',
    		'ano'=> 2017, 
    		'local_'=>'na', 
    		'obs' => 'sai do face', 
    		'editora'=>'ifmt', 
    		'autor'=>'eu' 
    		);
		$this->load->model('Livro','livro');
		//$this->res->setSituacao(1,1);
		//$this->livro->registrar('2016-10-11' ,'Bode Preto Sql', 'V1.1.1.1.1', 2015, 'Xavantineir', 'Não ler' ,'Pe na jaca','A livia fez isso');
		$a=$this->livro->getLivros()->result_array();
		debugPrint($a,'getLivros');
		$this->livro->update(1,$dados);
		$b=$this->livro->getById(1)->result_array();
		debugPrint($b,'getById');
	}
}