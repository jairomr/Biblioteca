<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function ajaxStatus($url){
   $html= "<script type='text/javascript'>
            function btnreprovado(id) {
                    $('#log').html(' ');
                    $.ajax({
                        url: '".base_url($url."/reprovar/")."/'+id,
                        success: function (retorno) {
                            $('#log').html(retorno);
                            $('#status-'+id).html('<span style=".'"'."color:#d9534f;".'"'.">Reprovado</span>');
                            $('#link-'+id).html('<a title=".'"'."Aprovar registro".'"'." href=".'"'."#".'"'." onclick=".'"'."btnaprovado('+id+')".'"'."><i style=".'"'."margin:5px;".'"'." class=".'"'."fa fa-check".'"'." aria-hidden=".'"'."true".'"'."></i></a>');
                        }
                    });
                    return false;
                };
            function btnaprovado(id) {
                    $('#log').html(' ');
                    $.ajax({
                        url: '".base_url($url."/aprovar/")."/'+id,
                        success: function (retorno) {
                            $('#log').html(retorno);
                            $('#status-'+id).html('<span style=".'"'."color:#5cb85c;".'"'.">Aprovado</span>');
                            $('#link-'+id).html('<a title=".'"'."Reprovar registro".'"'." href=".'"'."#".'"'." onclick=".'"'."btnreprovado('+id+')".'"'."><i style=".'"'."margin:5px;".'"'." class=".'"'."fa fa-ban".'"'." aria-hidden=".'"'."true".'"'."></i></a>');
                        }
                    });
                    return false;
                };</script>";
   return $html;
    
}
function formAjax($url,$idform='formAjax',$return='log'){
    $html= '<script type="text/javascript">
           $("#'.$idform.'").on("submit", (function (e) {
                e.preventDefault();
                $("#log").empty();
                $.ajax({
                    url: "'.base_url($url).'", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        $("#'.$return.'").html(data);
                    }
                });
            }));
        </script>';
    return $html;
}
