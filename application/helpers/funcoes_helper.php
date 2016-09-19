<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ------------------------------
 * Metodo de mostra erro de validaçao
 * ------------------------------ 
 */
function erros_validacao() {
    if (validation_errors()) {
        echo '<div class="alert alert-danger"><strong>Erro!</strong>' . validation_errors() . '</div>';
    }
}

//.erros_validacao
function get_calendario() {
    $CI = & get_instance();
    $CI->load->model('Calendar_Model', 'calendar');
    $query = $CI->calendar->getVist();
    if ($query->num_rows() > 0) {
        $html = '';
        foreach ($query->result() as $value) {
            $html.="{
                title: '$value->name',
		start: '$value->start',
                end:   '$value->end',
		description: '$value->activities'";
            if ($value->confirmed == 0) {
                $html.=',color: "#257e4a"';
            }
            $html.="},";
        }
        return $html;
    }
    return '';
}

/**
 * ------------------------------
 * Metodo de escrever um mensagem baseado no http://getbootstrap.com/components/#alerts
 * ------------------------------ 
 * @param type $tipo Tipo de Messagen (http://getbootstrap.com/components/#alerts)
 * @param type $msg mensage da a ser emprimida
 * @param type $titulo Titulo Mensage 
 */
function echo_msg($tipo = 'info', $msg = NULL, $titulo = NULL) {
    switch ($tipo) {
        case 'info':
            if ($titulo == NULL) {
                echo ('<div class="alert alert-info"><strong>Info! </strong>' . $msg . '</div>');
            } else {
                echo ('<div class="alert alert-info"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'sucesso':
            if ($titulo == NULL) {
                echo ('<div class="alert alert-success"><strong>Sucesso! </strong>' . $msg . '</div>');
            } else {
                echo ('<div class="alert alert-success"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'perigo':
            if ($titulo == NULL) {
                echo ('<div class="alert alert-danger"><strong>Perigo! </strong>' . $msg . '</div>');
            } else {
                echo ('<div class="alert alert-danger"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'aviso':
            if ($titulo == NULL) {
                echo ('<div class="alert alert-warning"><strong>Aviso! </strong>' . $msg . '</div>');
            } else {
                echo ('<div class="alert alert-warning"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        default:
            if ($titulo == NULL) {
                echo ('<div class="alert alert-info"><strong>Info! </strong>' . $msg . '</div>');
            } else {
                echo ('<div class="alert alert-info"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
    }
}

/**
 * ------------------------------
 * Metodo de criar Flashdata
 * ------------------------------ 
 * @param type $id id da Flashdata
 * @param type $msg mensage da Flashdata
 * @param type $tipo Tipo de Messagen (http://getbootstrap.com/components/#alerts)
 * @param type $titulo Titulo do Flashdata 
 */
function set_msg($id = 'infomsg', $msg = NULL, $tipo = 'info', $titulo = NULL) {
    $CI = & get_instance();
    switch ($tipo) {
        case 'info':
            if ($titulo == NULL) {
                $CI->session->set_flashdata($id, '<div class="alert alert-info"><strong>Info! </strong>' . $msg . '</div>');
            } else {
                $CI->session->set_flashdata($id, '<div class="alert alert-info"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'sucesso':
            if ($titulo == NULL) {
                $CI->session->set_flashdata($id, '<div class="alert alert-success"><strong>Sucesso! </strong>' . $msg . '</div>');
            } else {
                $CI->session->set_flashdata($id, '<div class="alert alert-success"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'perigo':
            if ($titulo == NULL) {
                $CI->session->set_flashdata($id, '<div class="alert alert-danger"><strong>Perigo! </strong>' . $msg . '</div>');
            } else {
                $CI->session->set_flashdata($id, '<div class="alert alert-danger"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        case 'aviso':
            if ($titulo == NULL) {
                $CI->session->set_flashdata($id, '<div class="alert alert-warning"><strong>Aviso! </strong>' . $msg . '</div>');
            } else {
                $CI->session->set_flashdata($id, '<div class="alert alert-warning"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
        default:
            if ($titulo == NULL) {
                $CI->session->set_flashdata($id, '<div class="alert alert-info"><strong>Info! </strong>' . $msg . '</div>');
            } else {
                $CI->session->set_flashdata($id, '<div class="alert alert-info"><strong>' . $titulo . ' </strong>' . $msg . '</div>');
            }
            break;
    }
}

//.set_msg
/**
 * ------------------------------
 * Metod de obter o Flashdata
 * ------------------------------ 
 * @param type $id id que quer obter
 * @param type $printar True para emprimir na tela FALSE para retornar String
 * @return boolean se nao ver flashdata retornara false
 */
function get_msg($id = NULL, $printar = TRUE) {
    $CI = & get_instance();
    if ($CI->session->flashdata($id)) {
        if ($printar) {
            echo $CI->session->flashdata($id);
        } else {
            return $CI->session->flashdata($id);
        }
    } else {
        return FALSE;
    }
}

//.get_msg

function auditoria($op, $ob, $q = TRUE) {
    $CI = & get_instance();
    $CI->load->library('session');
    $CI->load->model('auditoria_models', 'auditoria');
    if ($q) {
        $query = $CI->db->last_query();
    } else {
        $query = '';
    }
    if (esta_logado(FALSE)) {
        $user_login = $CI->session->userdata('user_login');
        $ip = $CI->session->userdata('user_ip');
    } else {
        $user_login = 'Desconecido';
        $ip = getenv("REMOTE_ADDR");
    }

    $dados = array(
        'usuario' => $user_login,
        'operacao' => $op,
        'query' => $query,
        'observacao' => $ob,
        'ip' => $ip
    );
    $CI->auditoria->do_insert($dados);
}

//.auditoria
/**
 * -----------------------------------------
 * Metod de carregar o editor Html
 * ----------------------------------------- 
 */

function editorhtml() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    set_tema('time', load_js(array('jquery.tinymce.min', 'tinymce.min'), 'js/tinymce'), FALSE);
}

//.editor

function thumb($i = NULL, $l = 100, $a = 75, $g = TRUE, $alt = '') {
    $CI = & get_instance();
    $CI->load->helper('file');
    $trumb = $l . 'x' . $a . '_' . $i;
    $trumbinfo = get_file_info('./uploads/trumbs/' . $trumb);
    if ($trumbinfo != FALSE) {
        $r = base_url('uploads/trumbs/' . $trumb);
    } else {
        $CI->load->library('image_lib');
        $c['image_library'] = 'gd2';
        $c['source_image'] = './uploads/' . $i;
        $c['new_image'] = './uploads/trumbs/' . $trumb;
        $c['maintain_ratio'] = TRUE;
        $c['width'] = $l;
        $c['height'] = $a;
        $CI->image_lib->initialize($c);
        if ($CI->image_lib->resize()) {
            $CI->image_lib->clear();
            $r = base_url('uploads/trumbs/' . $trumb);
        } else {
            $r = FALSE;
        }
    }
    if ($g && $r != FALSE) {
        $r = '<img src="' . $r . '" alt="' . $alt . '">';
    }
    return $r;
}

/**
 * -----------------------------------------
 * Metodo de criar um slug
 * -----------------------------------------
 * @param type $string Recebe um Titulo para conver tem um slug
 * @return type retorna o slug
 */
function slug($string) {
    if (is_string($string)) {
        $string = strtolower(trim(utf8_decode($string)));
        $before = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRrñ';
        $after = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRrn';
        $string = strtr($string, utf8_decode($before), $after);
        $replace = array(
            '/[^a-z0-9.-]/' => '-',
            '/-+/' => '-',
            '/\-{2,}/' => ''
        );
        $string = preg_replace(array_keys($replace), array_values($replace), $string);
    }
    return url_title($string, '-', TRUE);
}

//.slug
/**
 * -----------------------------------------
 * Meto de resumir o texto
 * -----------------------------------------
 * @param type $s
 * @param type $p
 * @param type $h
 * @param type $t
 * @return boolean
 */
function resumo($s = NULL, $p = 50, $h = TRUE, $t = TRUE) {
    if ($s != NULL) {
        if ($h)
            $s = to_html($s);
        if ($t)
            $s = strip_tags($s);
        $r = word_limiter($s, $p);
    }else {
        $r = False;
    }
    return $r;
}

//.resumo
//Retorna Html valido
function to_html($s) {
    return html_entity_decode($s);
}

//Incluir arquivos
function incluir_arquivo($a = NULL, $p = 'includes', $e = TRUE) {
    $CI = & get_instance();
    if ($e) {
        echo $CI->load->view("$p/$a", '', TRUE);
        return TRUE;
    } else {
        return $CI->load->view("$p/$a", '', TRUE);
    }
}

//Salvar ou autalizar config
function set_setting($nome, $valor = NULL) {
    $CI = & get_instance();
    $CI->load->model('settings_models', 'settings');
    if ($CI->settings->get_bynome($nome)->num_rows() == 1) {
        if (trim($valor) === '') {
            $CI->settings->do_delete(array('nome_config' => $nome), FALSE, FALSE);
        } else {
            $dados = array(
                'nome_config' => $nome,
                'valor_config' => $valor
            );
            $CI->settings->do_update($dados, array('nome_config' => $nome), FALSE);
        }
    } elseif ($valor != '') {
        $dados = array(
            'nome_config' => $nome,
            'valor_config' => $valor
        );
        $CI->settings->do_insert($dados, FALSE);
    } else {
        
    }
}

//.set_settings
//Obtem as config
function get_setting($nome) {
    $CI = & get_instance();
    $CI->load->model('settings_models', 'settings');
    $settings = $CI->settings->get_bynome($nome);
    if ($settings->num_rows() == 1) {
        $settings = $settings->row();
        return $settings->valor_config;
    } else {
        return NULL;
    }
}

function get_cat() {
    $CI = & get_instance();
    $CI->load->model('settings_models', 'settings');
    $settings = $CI->settings->get_all_cat();
    return $settings;
}

function query_to_csv($query, $filename, $attachment = false, $headers = true) {
    $CI = & get_instance();
    $CI->load->model('Temperatura_models', 'temp');
    if ($attachment) {
        // send response headers to the browser
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);
        $fp = fopen('php://output', 'w');
    } else {
        $fp = fopen($filename, 'w');
    }

    $result = $CI->temp->query($query);

    if ($headers) {
        // output header row (if at least one row exists)
        $row = $result->row_array();
        if ($row) {
            fputcsv($fp, array_keys($row));
            // reset pointer back to beginning
            $result->data_seek(0);
        }
    }

    while ($row = $result->row_array()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    //return($fp);
    exit;
}

function publicacao() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    $CI->load->model('Publicacao_Model','publicaco');
    $query=$CI->publicaco->get_byativos();
    $html='';
    $html.=$query;                
    $html.='</tbody></table>';
    return $html;
}
function viewModel($url=NULL){
    switch ($url){
        case 'all':
            return -1;
        case 'privat':
            return 0;
        case 'public':
            return 1;
        default :
            return -1;
    }
}
