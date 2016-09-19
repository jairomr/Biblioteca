<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Criar
 * Upar
 * Deletar 
 * Incerir
 */

function editarPublicacao() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    $CI->load->model('Publicacao_Model', 'publicaco');
    $id = $CI->uri->segment(3);
    $query = $CI->publicaco->get_byid($id);
    return $query;
}
/**
 * Metodo de criar link ou estado da linha
 * @param type $status recebe o status da linha
 * @param type $id recebe o id da linha para criar link
 * @param type $url recebe a url do controle da linha para criar link
 * @return string
 */
function status($status=0, $id = null, $url = null) {
    if ($url == null) {
        if($status==0){
            $html='<span style="color:#d9534f;">Reprovado</span>';
        }else{
            $html='<span style="color:#5cb85c;">Aprovado</span>';
        }
    } else {
        if ($status == 0) {
            $html = '<a title="Aprovar registro" href="#" onclick="btnaprovado('.$id.')"><i style="margin:5px;" class="fa fa-check" aria-hidden="true"></i></a>';
        } else {
            $html = '<a title="Reprovar registro" href="#" onclick="btnreprovado('.$id.')"><i style="margin:5px;" class="fa fa-ban" aria-hidden="true"></i></a>';
        }
    }
    return $html;
}

function alertas($url) {
    $url = base_url($url);
    $html = "
            <script type='text/javascript'>
$(document).ready(function () {
    $('.btn-apagar').click(function (event) {
        var apagar = confirm('Deseja realmente excluir este registro?');
        if (apagar) {
// aqui vai a instrução para apagar registro

        } else {
            event.preventDefault();
        }
    });
    $('.btn-aprovar').click(function (event) {
        var apagar = confirm('Deseja realmente aprovar este registro?');
        if (apagar) {
// aqui vai a instrução para apagar registro
            event.preventDefault();
            $('#log').empty();
            $.ajax({
                url: '" . $url . "/aprovar', // Url to which the request is send
                type: 'POST', // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('#log').html(data);
                }
            });
        } else {
            event.preventDefault();
        }
    });
    $('.btn-reprovar').click(function (event) {
        var apagar = confirm('Deseja realmente reprovar este registro?');
        if (apagar) {
            event.preventDefault();
            $('#log').empty();
            $.ajax({
                url: '" . $url . "/reprovar', // Url to which the request is send
                type: 'POST', // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $('#log').html(data);
                }
            });
        } else {
            event.preventDefault();
        }
    });
    $('.btn-editar').click(function (event) {
        var apagar = confirm('Deseja realmente editar este registro?');
        if (apagar) {
    // aqui vai a instrução para apagar registro
            $('#log').html('teste');
        } else {
            event.preventDefault();
        }
    });
    $('#form_editar').on('submit', (function (e) {
        e.preventDefault();
        $('#log').empty();
        $.ajax({
            url: '" . $url . "/editar', // Url to which the request is send
            type: 'POST', // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#log').html(data);
            }
        });
    }));

});
</script>";
    return $html;
}
