<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ------------------------------
 * Metodo de carregar os modulos
 * ------------------------------ 
 * @param type $modulo modolu a ser carregado
 * @param type $tela tela do modulo a ser carregada
 * @param type $diretorio pasta do modulo
 * @return boolean retorna o modulo || FALSE se ouver erro
 */

function load_modulo($modulo = NULL, $tela = NULL, $diretorio = 'components') {
    $CI = & get_instance();
    if ($modulo != NULL) {
        return $CI->load->view("$diretorio/$modulo", array('tela' => $tela), TRUE);
    } else {
        return FALSE;
    }
}
function breadcrumb($limite=2) {
    $CI = & get_instance();
    $limite--;
    $html ='<ol class="breadcrumb">'."\n".'<li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> HOME</a></li>';
    $link='';
    $i=0;
    $j=count($CI->uri->segment_array())-1;
    while ($i <= $j&&$i<=$limite) {
        if($i==$j||$i==$limite){
            $link .= $CI->uri->slash_segment($i+1, 'leading');
            $html .='<li class="active"><a href="'.base_url($link).'">'.strtoupper($CI->uri->segment($i+1)).'</a></li>'."\n";
        }else{
            $link .= $CI->uri->slash_segment($i+1, 'leading');
            $html .='<li><a href="'.base_url($link).'">'.strtoupper($CI->uri->segment($i+1)).'</a></li>'."\n";
        }
        $i++;   
    }
    $html.='</ol>';
    return $html;

}
function includesTema($file = NULL, $diretorio = 'includes',$var = NULL) {
    $CI = & get_instance();
    if ($file != NULL) {
        return $CI->load->view("$diretorio/$file",$var, TRUE);
    } else {
        return FALSE;
    }
}

function load_conteudo($modulo = NULL,$tela=NULL, $dados = array()) {
    $CI = & get_instance();
    if ($modulo != NULL && $tela !=null) {
        return $CI->parser->parse("$modulo/$tela", $dados, true);
    }elseif($modulo != NULL){
        return $CI->parser->parse("$modulo", $dados, true);
    } else {
        return FALSE;
    }
}


//.load_modulo
/**
 * ------------------------------
 * Metodo de definir um tema
 * ------------------------------
 * @param type $prop
 * @param type $valor
 * @param type $replace
 */

function set_tema($prop, $valor, $replace = TRUE) {
    $CI = & get_instance();
    $CI->load->library('sistema');
    if ($replace) {
        $CI->sistema->tema[$prop] = $valor;
    } else {
        if (!isset($CI->sistema->tema[$prop])) {
            $CI->sistema->tema[$prop] = $valor;
        } else {
            $CI->sistema->tema[$prop] .= $valor;
        }//.isset(CI)
    }//.if replace
}

//.set_tema
/**
 * ------------------------------
 * Metodo de obter o tema
 * ------------------------------
 * @return type retorna o tema
 */

function get_tema() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    return $CI->sistema->tema;
}

//.get_tema
/**
 * ------------------------------
 * Metodo de carrgar a template
 * ------------------------------
 */

function load_template() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    $CI->parser->parse($CI->sistema->tema['template'], get_tema());
    //$CI->output->cache(15);
}

//.load_template
/**
 * ------------------------------
 * Metodo de carrgar os css
 * ------------------------------
 * @param type $arquivo arquivo css, pode ser passado em array
 * @param type $pasta pasta dos arquivo
 * @param type $media tipo de midia
 * @return string retorna os css
 */

function load_css($arquivo = NULL, $pasta = 'library', $media = 'all') {
    if ($arquivo != NULL) {
        $CI = & get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $css) {
                $retorno.='<link rel="stylesheet" href="' . base_url("$pasta/$css.css") . '" media="' . $media . '"/>' . "\n";
            }//.foreach
        } else {
            $retorno.='<link rel="stylesheet" href="' . base_url("$pasta/$arquivo.css") . '" media="' . $media . '"/>' . "\n";
        }//.if(is_array) and else       
    }//.if($arquivo!=Null)
    return $retorno;
}

//.load_css
/**
 * ------------------------------
 * Metodo de carrgar o js
 * ------------------------------
 * @param type $arquivo arquivo js, pode ser informado um array
 * @param type $pasta pasta onde esta o js
 * @param boolean $remoto se o js vem de um servido remoto 
 * @return string retorna os js
 */

function load_js($arquivo = NULL, $pasta = 'js', $remoto = FALSE) {
    if ($arquivo != NULL):
        $CI = & get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $js) {
                if ($remoto) {
                    $retorno.= '<script type="text/javascript" src="' . $js . '"></script>' . "\n";
                } else {
                    $retorno.= '<script type="text/javascript" src="' . base_url("$pasta/$js.js") . '"></script>' . "\n";
                }
            }
        } else {
            if ($remoto) {
                $retorno.= '<script type="text/javascript" src="' . $arquivo . '"></script>' . "\n";
            } else {
                $retorno.= '<script type="text/javascript" src="' . base_url("$pasta/$arquivo.js") . '"></script>' . "\n";
            }
        }

    endif;
    return $retorno;
}

//.load_js

function datatable(){
    set_tema('css',  load_css(array('datatables-plugins/integration/bootstrap/3/dataTables.bootstrap','datatables-responsive/css/responsive.bootstrap')),false);
    set_tema('js', load_js(array('datatables/media/js/jquery.dataTables.min','datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min'), 'library'),false);
    set_tema('js', '<script type="text/javascript">$(document).ready(function () {
    $("#data_table").DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});</script>', false);
    
}

