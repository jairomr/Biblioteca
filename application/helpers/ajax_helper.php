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
