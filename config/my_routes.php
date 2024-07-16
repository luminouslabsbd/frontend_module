<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$route['front'] = 'frontend_module/frontend_module/ll_home';
$route['frontcms/(:any)'] = 'frontend_module/frontend_module/ll_home';
$route['home'] = 'frontend_module/frontend_module/ll_home';
$route[''] = 'frontend_module/frontend_module/ll_home';
$route['saas/plans'] = 'frontend_module/frontend_module/ll_plans';
$route['saas/signup'] = 'frontend_module/frontend_module/ll_signup';
$route['saas/signup/(:any)'] = 'frontend_module/frontend_module/ll_signup';
$route['client/login'] = 'frontend_module/frontend_module/ll_client_login';
$route['client/forget'] = 'frontend_module/frontend_module/ll_client_forget';
$route['admin/authentication'] = 'frontend_module/frontend_module/ll_login';
$route['admin/authentication/forgot_password'] = 'frontend_module/frontend_module/ll_admin_forget';


if (function_exists('is_subdomain') && empty(is_subdomain())) {
    // if url is  start with /clients then redirect to /clients
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, '/clients') === 0 || strpos($url, '/login') === 0) {
        $route['default_controller'] = 'home';
    } else {
        $route['default_controller'] = 'frontend_module/frontend_module/ll_home';
        $route['(:any)'] = 'frontend_module/frontend_module/ll_home/$1';
    }
} else if (function_exists('is_subdomain') && !empty(is_subdomain())) {
    // if url is  start with /clients then redirect to /clients
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, '/clients') === 0 || strpos($url, '/login') === 0) {
        $route['default_controller'] = 'home';
    } else {
        $route['default_controller'] = 'frontend_module/frontend_module/ll_home';
        $route['(:any)'] = 'frontend_module/frontend_module/ll_home';
    }
    $route['admin/dashboard'] = 'saas/gb_admin/billings';
}

if (function_exists('check_subdomain')) {
    $subdomain = check_subdomain();
    if (!empty($subdomain)) {
        $company_route = $subdomain['slug'];

        // Clone existing static routes with company route
        foreach ($route as $key => $value) {
            $new_key = $company_route . "/" . ($key == '/' ? '' : $key);
            $route[$new_key] = $value;
        }
        // Make catch-all static route for all the controllers method and modules using max of 7 levels.
        // Based on latest research perfex v3.4 7 level is more than sufficient (can increase with needs)
        $route["$company_route/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)"] = '$1/$2/$3/$4/$5/$6/$7/$8';
        $route["$company_route/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)"] = '$1/$2/$3/$4/$5/$6/$7';
        $route["$company_route/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)"] = '$1/$2/$3/$4/$5/$6';
        $route["$company_route/(:any)/(:any)/(:any)/(:any)/(:any)"] = '$1/$2/$3/$4/$5';
        $route["$company_route/(:any)/(:any)/(:any)/(:any)"] = '$1/$2/$3/$4';
        $route["$company_route/(:any)/(:any)/(:any)"] = '$1/$2/$3';
        $route["$company_route/(:any)/(:any)"] = '$1/$2';
        $route["$company_route/(:any)"] = '$1';
        $route["$company_route"] = 'clients';
    }
}

// check is_subdomain function is exist or not
if (!function_exists('guess_base_url')) {
    function guess_base_url()
    {
        $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
        $base_url .= '://' . $_SERVER['HTTP_HOST'];
        $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        $base_url = preg_replace('/install.*/', '', $base_url);
        return $base_url;
    }
}