<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	public function __construct() {
		parent::__construct();
		set_tema('template', 'teste');
	}
	public function index()
	{	
		$A=$this->uri->segment(3);
		set_tema('teste', teemo($A));
		load_template();
	}
}