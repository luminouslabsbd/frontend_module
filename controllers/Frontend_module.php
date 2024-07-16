<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_module extends  ClientsController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('app_modules');
        $this->load->model('Fsaas_model');
        hooks()->add_action('clients_authentication_constructor', array($this, 'after_contact_login_action'));

    }
    
    // Frontend change language 
    public function change_language_ll($lang = '')
    {
        if (is_language_disabled()) {
            redirect(site_url());
        }
        set_contact_language($lang);

        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(site_url());
        }
    }

    // Frontend Saas Home Page 
    public function ll_home(){
        $data['name'] = 'Home';
        $this->load->view('ll_home', $data);
    }

    // Saas User Plan Page Function 
    public function ll_plans(){

        $data['name'] = 'planes';
        $symbol = get_base_currency()->symbol;
        $billing_cycle = get_active_frequency();
        $all_packages = $this->Fsaas_model->get_packages();

        $data['symbol'] = $symbol;
        $data['all_packages'] = $all_packages;
        $data['billing_cycle'] = $billing_cycle;

        $this->load->view('ll_plan', $data);
    }

    // Frontend Saas user - client Login Page & logged function
    public function ll_client_login(){

        if (is_client_logged_in()) {
            redirect(site_url());
        }

        if ($this->input->method() == 'post') {
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', _l('clients_login_password'), 'required');
            $this->form_validation->set_rules('email', _l('clients_login_email'), 'trim|required|valid_email');

            if (show_recaptcha_in_customers_area()) {
                $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_recaptcha');
            }
            
            if ($this->form_validation->run() !== false) {
                $this->load->model('Authentication_model');
                
                $success = $this->Authentication_model->login(
                    $this->input->post('email'),
                    $this->input->post('password', false),
                    $this->input->post('remember'),
                    false
                );

                if (is_array($success) && isset($success['memberinactive'])) {
                    set_alert('danger', _l('inactive_account'));
                    redirect(site_url('client/login'));
                } elseif ($success == false) {
                    set_alert('danger', _l('client_invalid_username_or_password'));
                    redirect(site_url('client/login'));
                }

                if ($this->input->post('language') && $this->input->post('language') != '') {
                    set_contact_language($this->input->post('language'));
                }

                $this->load->model('announcements_model');
                $this->announcements_model->set_announcements_as_read_except_last_one(get_contact_user_id());

                maybe_redirect_to_previous_url();
                redirect(site_url('clients'));
            }
            if (get_option('allow_registration') == 1) {
                $data['title'] = _l('clients_login_heading_register');
            } else {
                $data['title'] = _l('clients_login_heading_no_register');
            }

        }else{
            $this->load->view('ll_client_login');
        }

    }

    // Frontend Saas user - client  forget Page & And process
    public function ll_client_forget(){

        if (is_client_logged_in()) {
            redirect(site_url());
        }

        $this->load->library('form_validation');

        if ($this->input->post()) {

            $this->form_validation->set_rules(
                'email',
                _l('customer_forgot_password_email'),
                'trim|required|valid_email|callback_contact_email_exists'
            );
            
            $this->load->model('Authentication_model');
            $success = $this->Authentication_model->forgot_password($this->input->post('email'));
            if (is_array($success) && isset($success['memberinactive'])) {
                set_alert('danger', _l('inactive_account'));
            } elseif ($success == true) {
                set_alert('success', _l('check_email_for_resetting_password'));
            } else {
                set_alert('danger', _l('error_setting_new_password_key'));
            }
            redirect(site_url('client/forget'));
            

        }else{
            $this->load->view('ll_client_forget');
        }        
    }

    // Frontend Saas User-Client Registar - Saas user
    public function ll_signup(){

        $data['name'] = 'Sign up';

        // get referer from url and set in session
        $referer = $this->input->get('via');
        if (!empty($referer)) {
            $this->session->set_userdata('referer', $referer);
        }

        $data['title'] = get_option('saas_companyname') ? get_option('saas_companyname') : 'Register';
        $data['active_menu'] = "pricing";

        $all_packages = $this->Fsaas_model->get_packages();
        $data['register'] = true;
        $data['all_packages'] = $all_packages ;

        $this->load->view('ll_signup', $data);

    }

    // Frontend Saas user - client  Registation process
    public function signed_up()
    {
        $data = $this->Fsaas_model->array_from_post(array('name', 'email', 'package_id', 'domain', 'mobile', 'address', 'country'));

        $domain = $this->input->post('domain', true);
        $data['domain'] = domainUrl(slug_it($domain));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required|trim|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|is_unique[tbl_saas_companies.email]');
        $this->form_validation->set_rules('package_id', 'package', 'required|trim');
        $this->form_validation->set_rules('domain', 'domain', 'required|trim|callback_check_domain');

        $data['timezone'] = ConfigItems('saas_default_timezone');
        $data['language'] = ConfigItems('saas_active_language');
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['created_by'] = NULL;
        $disable_email_verification = ConfigItems('disable_email_verification');
        if (!empty($disable_email_verification) && $disable_email_verification == 1) {
            $data['status'] = 'running';
            $data['password'] = '123456';
        } else {
            $data['status'] = 'pending';
        }
        $company_url = companyUrl($data['domain']);
        $this->load->library('uuid');
        $data['activation_code'] = $this->uuid->v4();

        $check_email = get_row('tbl_saas_companies', array('email' => $data['email']));
        // check email already exist
        $check_domain = get_row('tbl_saas_companies', array('domain' => $data['domain']));
        $reserved = check_reserved_tenant($data['domain']);
        if (!empty($check_email)) {
            $type = 'error';
            $msg = _l('already_exists', _l('email'));
        } else if (!empty($check_domain)) {
            $type = 'error';
            $msg = _l('already_exists', _l('domain'));
        } else if (!empty($reserved)) {
            $type = 'error';
            $msg = _l('already_exists', _l('domain'));
        } else {
            if ($this->form_validation->run() == FALSE) {
                $type = 'warning';
                $msg = $this->form_validation->error_array();
                set_alert($type, $msg);
                redirect('saas/signup');
            } else {
                $billing_cycle = $this->input->post('billing_cycle', true);
                $package_info = get_row('tbl_saas_packages', array('id' => $data['package_id']));
                $package_info = apply_coupon($package_info);
                // deduct $billing_cycle from price
                $data['frequency'] = str_replace('_price', '', $billing_cycle);;
                $data['trial_period'] = $package_info->trial_period;
                $data['is_trial'] = 'Yes';
                $data['expired_date'] = $this->input->post('expired_date', true);;
                $data['currency'] = get_base_currency()->name;
                $offer_price = $data['frequency'] . '_offer';
                if (!empty($package_info->$offer_price)) {
                    $data['amount'] = $package_info->$offer_price;
                } else {
                    $data['amount'] = $package_info->$billing_cycle;
                }

                // enable_affiliate and get referral code from session
                $is_enabled = ConfigItems('enable_affiliate');
                $referer = $this->session->userdata('referer');
                if ($is_enabled && !empty($referer)) {
                    // get user id from referral
                    $user_info = get_row('tbl_saas_affiliate_users', array('referral_link' => $referer));
                    if (!empty($user_info)) {
                        $data['referral_by'] = $user_info->user_id;
                    }

                }

                $this->Fsaas_model->_table_name = 'tbl_saas_companies';
                $this->Fsaas_model->_primary_key = 'id';
                $id = $this->Fsaas_model->save($data);

                $this->Fsaas_model->save_client($id, $data['password']);

                if (!empty($data['referral_by'])) {
                    $this->Fsaas_model->add_affiliate($id, $data, true);
                    // remove referral from session
                    $this->session->unset_userdata('referer');
                }
                
                // change active status to 0 for all previous data of this company
                $this->Fsaas_model->_table_name = 'tbl_saas_companies_history';
                $this->Fsaas_model->_primary_key = 'companies_id';
                $this->Fsaas_model->save(array('active' => 0), $id);

                $data['companies_id'] = $id;
                $data['ip'] = $this->input->ip_address();
                $this->Fsaas_model->update_company_history($data);

                // create database for this company
                if ($data['status'] == 'running') {
                    // create database for the company
                    $this->Fsaas_model->create_database($id);
                }

                if (empty($disable_email_verification) && $disable_email_verification !== 1) {
                    $this->Fsaas_model->send_activation_token_email($id);
                }

                $type = "success";
                if ($data['status'] == 'running') {
                    $msg = '';
                    $msg .= '<p>Hi ' . $data['name'] . ',</p>';
                    $msg .= '<p>here is your company URL Admin: <a href="' . $company_url . 'admin" target="_blank">' . $company_url . 'admin</a></p>';
                    $msg .= 'Username: ' . $data['email'] . '<br>';
                    $msg .= 'Password: ' . $data['password'] . '<br>';
                    $msg .= '<p>Thanks</p>';
                } else {
                    $msg = 'Registration Successfully Completed. Please check your email for activation link. if you not received email please check spam folder.if you still not received email please contact with us for activate your account.';
                }
                log_activity('New Company Created [ID:' . $id . ', Name: ' . $data['name'] . ']');

            }
        }
        $message = $msg;
        set_alert($type, $message);
        redirect('saas/signup');
    }


    //Admin Login - 
    public function ll_login(){

        if ($this->input->method() == 'post') {
            
            $this->load->model('Authentication_model');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', _l('clients_login_password'), 'required');
            $this->form_validation->set_rules('email', _l('clients_login_email'), 'trim|required|valid_email');

            if ($this->form_validation->run() !== false) {
                $email    = $this->input->post('email');
                $password = $this->input->post('password', false);
                $remember = $this->input->post('remember');

                $data = $this->Authentication_model->login($email, $password, $remember, true);

                if (is_array($data) && isset($data['memberinactive'])) {
                    set_alert('danger', _l('admin_auth_inactive_account'));
                    redirect(admin_url('admin/authentication'));
                } elseif (is_array($data) && isset($data['two_factor_auth'])) {
                    $this->session->set_userdata('_two_factor_auth_established', true);
                    if ($data['user']->two_factor_auth_enabled == 1) {
                        $this->Authentication_model->set_two_factor_auth_code($data['user']->staffid);
                        $sent = send_mail_template('staff_two_factor_auth_key', $data['user']);

                        if (!$sent) {
                            set_alert('danger', _l('two_factor_auth_failed_to_send_code'));
                            redirect(admin_url('admin/authentication'));
                        } else {
                            $this->session->set_userdata('_two_factor_auth_staff_email', $email);
                            set_alert('success', _l('two_factor_auth_code_sent_successfully', $email));
                            redirect(admin_url('authentication/two_factor'));
                        }
                    } else {
                        set_alert('success', _l('enter_two_factor_auth_code_from_mobile'));
                        redirect(admin_url('authentication/two_factor/app'));
                    }
                } elseif ($data == false) {
                    set_alert('danger', _l('admin_auth_invalid_email_or_password'));
                    redirect(admin_url('admin/authentication'));
                }

                $this->load->model('announcements_model');
                $this->announcements_model->set_announcements_as_read_except_last_one(get_staff_user_id(), true);

                maybe_redirect_to_previous_url();

                hooks()->do_action('after_staff_login');
                redirect(admin_url());
            } 
        } else {
            $data['name'] = 'Login';
            $this->load->view('ll_admin_login', $data);
        }

    }

    // Admin Forgat Password 
    public function ll_admin_forget(){

        if (is_staff_logged_in()) {
            redirect(admin_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', _l('admin_auth_login_email'), 'trim|required|valid_email|callback_email_exists');

        if ($this->input->post()) {
            
            if ($this->form_validation->run() !== false) {
                $success = $this->Authentication_model->forgot_password($this->input->post('email'), true);
                if (is_array($success) && isset($success['memberinactive'])) {
                    set_alert('danger', _l('inactive_account'));
                    redirect(admin_url('admin/authentication/forgot_password'));
                } elseif ($success == true) {
                    set_alert('success', _l('check_email_for_resetting_password'));
                    redirect(admin_url('admin/authentication'));
                } else {
                    set_alert('danger', _l('error_setting_new_password_key'));
                    redirect(admin_url('admin/authentication/forgot_password'));
                }
            }
        }

        $this->load->view('ll_admin_forget');

    }

    

    

    

    

}
