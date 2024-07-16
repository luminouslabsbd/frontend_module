<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */

defined('BASEPATH') or exit('No direct script access allowed');
// require(__DIR__ . '/vendor/autoload.php');

/*
Module Name: Frontend API
Description: Sample module description.
Version: 2.3.0
Requires at least: 2.3.*
*/

define('FRONTEND_MODULE_NAME', 'frontend_module');

$CI = &get_instance();

register_activation_hook(FRONTEND_MODULE_NAME, 'frontend_module_activation_hook');

register_language_files(FRONTEND_MODULE_NAME, [FRONTEND_MODULE_NAME]);

function frontend_module_activation_hook()
{
    $CI = &get_instance();
    require_once(__DIR__ . '/install.php'); 
}

/**
* Register module deactivation hook
* @param  string $module   module system name
* @param  mixed $function  function for the hook
* @return mixed
*/


    // hooks()->add_action('clients_login_form_start', 'new_login_page_return');

    // function new_login_page_return($value)
    // {
    //     $CI        = &get_instance();
    //     $CI->load->library('app_modules');
    //     $data['title'] = "Home";
    //     $CI->load->view('frontend_module/ll_client_login', $data);

    // }
        
    hooks()->add_action('after_client_logout', 'client_redirect_login_page');

    function client_redirect_login_page()
    {
        redirect(site_url('client/login'));
    }

    // hooks()->add_action('after_user_logout', 'admin_redirect_login_page');
    // function admin_redirect_login_page()
    // {
    //     redirect(site_url('frontend_module/ll_login'));
    // }
