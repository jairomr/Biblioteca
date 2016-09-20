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
function load_base($template = 'page',$debug=false) {
    if($debug){
    $CI = & get_instance();
    $CI->output->enable_profiler(TRUE);
}
    set_tema('template', $template);
    set_tema('css',load_css('bootstrap.min','static/bootstrap/css'),false);
    set_tema('css', "\n".'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">'."\n".'<!-- Ionicons -->'."\n".'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">', false);
    set_tema('css',load_css(array('AdminLTE.min','skins/_all-skins.min'),'static/dist/css'),false);
    set_tema('css','<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->'."\n<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->\n<!--[if lt IE 9]>\n".'<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>'."\n".'<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>'."\n".'<![endif]-->',false);
    set_tema('js',load_js('plugins/jQuery/jquery-2.2.3.min','static'),false);
    set_tema('js',load_js('bootstrap/js/bootstrap.min','static'),false);
    set_tema('js',load_js(array('slimScroll/jquery.slimscroll.min','fastclick/fastclick'),'static/plugins'),false);
    set_tema('js',load_js(array('app.min','demo'),'static/dist/js'),false);
    set_tema('mainHeader',includesTema('mainHeader'));
    set_tema('mainSidebar',includesTema('mainSidebar'));
    set_tema('footer',includesTema('footer'));
    set_tema('controlSidebar',includesTema('controlSidebar'));
    set_tema('titilo_base', 'Biblioteca');
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

