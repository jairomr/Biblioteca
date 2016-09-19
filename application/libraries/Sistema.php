<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Sistema
{
    protected $ci;
    public $tema = array();
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper(array('funcoes','initialize','template','access', 'cudi', 'ajax'));
        //$this->ci->load->helper('initialize');
    }

    //Enviar email
    public function enviar_email($to, $subject, $message, $formato='html' ){
	$this->ci->load->library('email');
	$config['mailtype'] = $formato;
	$this->ci->email->initialize($config);
	$this->ci->email->from('nxgame2009@gmail.com', 'Admistração');
	$this->ci->email->to($to);
	$this->ci->email->subject($subject);
	$this->ci->email->message($message);
	if($this->ci->email->send()){
        	return TRUE;
	}else{
        	return $this->ci->email->print_debugger();
	}
    }//.eviar_email

	

}

/* End of file sistema.php */
/* Location: ./application/libraries/sistema.php */
