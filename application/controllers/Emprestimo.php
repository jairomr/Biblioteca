<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        load_base('emprestimo');
        $this->load->library('form_validation');
    }
	public function index()
	{	
		set_tema('titulo', 'Registro de Emprestimo');
		set_tema("css", load_css("daterangepicker","static/plugins/daterangepicker"),false);
		set_tema("js", load_js("daterangepicker","static/plugins/daterangepicker"),false );
		set_tema("js",'<script>
  $(function () {
$("#reservation").daterangepicker();
});</script>',false);
        set_tema('conteudo', load_conteudo('emprestimo', 'registrar',array()));
        load_template();
	}
	public function controle()
	{	
		set_tema('titulo', 'Controle de Emprestimo');
		set_tema("css", load_css("daterangepicker","static/plugins/daterangepicker"),false);
		set_tema("js", load_js("daterangepicker","static/plugins/daterangepicker"),false);
		set_tema("js",'<script>
  $(function () {
$("#reservation").daterangepicker();
});</script>',false);
        set_tema('conteudo', load_conteudo('emprestimo', 'registrar',array()));
        load_template();
	}
	
}
