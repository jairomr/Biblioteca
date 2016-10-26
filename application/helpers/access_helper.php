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
    return base64_encode(pack('H*', sha1($p)));
}
function teemo($p) {
   
    return md5('ÇÂp7ãIn T3&m0'.
        sha1(
            md5('c4pItão-t&3mo'.
                base64_encode(
                    pack('H*', sha1('ajçiovfnwej'.$p)
                        )
                    ).
                'n0-comando')
            ).
        'On D[]][Y');
    
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

/**
 * ------------------------------
 * Metodo de verificar se é admin
 * ------------------------------
 * @param boolean $msg True para retornar a menssage de erro
 * @return boolean TRUE admin, False not-admin
 */
function is_permission($nivel = 0, $msg = FALSE) {
    $CI = & get_instance();
    $CI->load->library('session');
    if (isLogado(FALSE)) {
        $admin = $CI->session->userdata('user_nivel');
        if (!isset($admin) || $admin < $nivel) {
            if ($msg) {
                set_msg('msgerro', 'Seu usuario não tem permição para executar esta operação.', 'aviso');
            }
            return FALSE;
        } else {
            return TRUE;
        }
    } else {
        if ($msg) {
                set_msg('msgerro', 'Efetua seu login.', 'aviso');
        }
         return FALSE;
    }
}

//.is_admin

/**
 * ------------------------------
 * Metodo de retornar o login da sessao atual
 * ------------------------------
 * @return type login da sessao atual em toUpper
 */
function login_name() {
    $CI = & get_instance();
    $login = $CI->session->userdata('user_login');
    return ' ' . strtoupper($login);
}

//.login_name
function nivelPermission($nivel){
    switch ($nivel){
        case 1:
            return 'Registrado';
        case 2:
            return 'Assinante';
        case 3:
            return 'Colaborador';
        case 4:
            return 'Bolsista';
        case 5:
            return 'Pesquisador';
        case 6:
            return 'Editor';
        case 7:
            return 'Moderador';
        case 8:
            return 'Adminstrador';
        case 9:
            return 'WebMaster';
    }
}