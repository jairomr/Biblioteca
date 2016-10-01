<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function ajax_redirect($location = '')
{
    $location = empty($location) ? '/' : $location;
    if (strpos($location, '/') !== 0 || strpos($location, '://') !== FALSE)
    {
        if ( ! function_exists('site_url'))
        {
            $this->load->helper('url');
        }

        $location = site_url($location);
    }

    $script = "window.location='{$location}';";
    $this->output->enable_profiler(FALSE)
        ->set_content_type('application/x-javascript')
        ->set_output($script);
}
function ajax_form($idForm,$link){
	$html="<script>
	$('#$idForm').submit(function(e) {
    	var form = $(this);
    	e.preventDefault();
   		$.ajax({
        	type: 'POST',
        	url: '".site_url($link)."',
        	data: form.serialize(), // <--- THIS IS THE CHANGE
        	dataType: 'json',
        	success: function(data){
            	msgAlert(data.type,data.title,data.msg);
                console.log(data);
        	},
        	error: function(data) { msgAlert('danger','Erro','Erro ao enviar temte mais tarde'); }
   		});
	});</script>";
	return $html;
}