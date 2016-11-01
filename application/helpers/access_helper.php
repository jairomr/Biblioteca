<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ------------------------------
 * Encrypitar a senha
 * ------------------------------ 
 * @param type $p recebe a senha para ser encrypitada
 * @return type retorna a senha crypitada
 */
function password($p) {
    return sha1('23t_C\}*Q3ug&B`DGEKcMD\rk[w<+xW8NFz:Jf=F&e'.base64_encode(pack('H*', sha1($p))));
}
//.password   
/**
 * ------------------------------
 * Verifica se o usuario esta logado
 * ------------------------------ 
 * @param boolean $redir True para redirecionar para tela de login
 * @return boolean True logado, False deslogad
 */
function isLogado($redir = TRUE) {
    $CI = & get_instance();
    $CI->load->library('session');
    $user_status = $CI->session->userdata('user_logado');
    if (!isset($user_status) || $user_status != TRUE) {
        if ($redir) {
            $CI->session->set_userdata(array('redir_para' => current_url()));
            set_msg('errologin', 'Acesso restrito, faça login antes de prosseguir', 'aviso');
            redirect('usuarios/login');
            return FALSE;
        } else {
            return FALSE;
        }
    } else {
        return TRUE;
    }
}

//.isLogado

}