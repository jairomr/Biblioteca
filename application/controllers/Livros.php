<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        load_base('livros');
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
		set_tema('titulo', 'Login');
        set_tema('conteudo', load_conteudo('usuarios', 'cadastra', $data));
        load_template();
	}
}
