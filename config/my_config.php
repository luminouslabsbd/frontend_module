<?php
defined('BASEPATH') or exit('No direct script access allowed');

// $config['csrf_token_name']   = defined('APP_CSRF_TOKEN_NAME') ? APP_CSRF_TOKEN_NAME : 'csrf_token_name';

$config['csrf_exclude_uris_frontend'] = ['forms/wtl/[0-9a-z]+', 'forms/ticket', 'forms/quote/[0-9a-z]+', 'admin/tasks/timer_tracking', 'api\/.+', 'razorpay/success\/.+',
'admin/bangara_module/bangara/tenent_user_registion','admin/bangara_module/bangara/check_domain_is_exists',
'admin/bangara_module/bangara/tenent_user_registion','admin/bangara_module/bangara/check_email_is_exists',
'admin/bangara_module/bangara_api/create','admin/bangara_module/bangara_api/api_request_form','admin/bangara_module/bangara_api/create_campaign',
'frontend_module/signed_up','saas/gb/check_already_exists','saas/gb/get_package_info','client/login','client/forget','admin/authentication',
'admin/authentication/forgot_password'];


