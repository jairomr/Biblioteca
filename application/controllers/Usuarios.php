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
		$data= array(
			'teste' => "Ola ",
			'teste2' => ENVIRONMENT, );
        set_tema('conteudo', load_conteudo('usuarios', 'cadastra', $data));
        load_template();
	}
}
