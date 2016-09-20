<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        load_base('usuarios',true);
        $this->load->library('form_validation');
    }
	public function index()
	{
		set_tema('titulo', 'Login');
		set_tema('subtitulo','Cadaf');
		$data= array(
			'teste' => 'oi',
			'teste2' => ENVIRONMENT);
        set_tema('conteudo', load_conteudo('usuarios', 'cadastra', $data));
        load_template();
	}
}
