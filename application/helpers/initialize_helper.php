<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function init_painel_at() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    set_tema('css', load_css('sb-admin'), FALSE);
    #set_tema('css', load_css('morris', 'css/plugins'),FALSE);
    set_tema('css', load_css('app'), FALSE);
    #set_tema('js', load_js(array('raphael.min','morris.min','morris-data'),'js/plugins/morris'),FALSE);
}//.init_template

function init_form() {
    $CI = & get_instance();
    $CI->load->library(array('sistema', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));
}

//.init_form
function load_base($template = 'page') {
    set_tema('template', $template);
    set_tema('css',  load_css('dist/css/mystyle'),false);
    set_tema('js','<link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">',false);
    set_tema('css', '<!-- Latest compiled and minified CSS --><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">', false);
    set_tema('css', '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">',false);
    set_tema('js', '<!-- jQuery (necessary for Bootstrap JavaScript plugins) --><script src="https://code.jquery.com/jquery-2.2.1.min.js"></script><!-- Latest compiled and minified JavaScript --><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>', false);
    set_tema('titilo_base', 'Dados Tanguro');
}

//.load_base

function init_site() {
    $CI = & get_instance();
    $CI->load->library(array('sistema', 'session', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));
    $CI->load->model('usuarios_models', 'usuarios');
    set_tema('titulo_padrao', 'JDev');
    set_tema('rodape', '<footer style="
			margin-top: 1%;
	width:100%;
	text-align: center;
	color:#fff;">
			<h6>&copy Todos os direitos reservado a JDev</h6>
	</footer>');
    set_tema('template', 'site');
    set_tema('css', load_css(array('bootstrap.min', 'app')), FALSE);
    set_tema('css', load_css('font-awesome.min', 'font-awesome/css'), FALSE);

    set_tema('js', load_js(array('jquery', 'bootstrap.min', 'menu')), FALSE);
}

//.init_site

