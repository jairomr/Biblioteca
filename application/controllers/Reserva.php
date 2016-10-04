<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        load_base('reserva');
        $this->load->library('form_validation');
    }

	public function index()
	{	
		painel();		
		set_tema('titulo', 'Cadastro de Reserva');
        set_tema('conteudo', load_conteudo('Reserva', 'reservadelivros'));
        load_template();
	}
	
}
