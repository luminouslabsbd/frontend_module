<?php 
 $this->load->view('header');
?>

<body>
    <div class="main">
       
        <?php $this->load->view('menu');   ?>    

        <section class="section pt-3">
            <div class="container ">
                <?php
                $alertclass = "";
                if ($this->session->flashdata('message-success')) {
                    $alertclass = "success";
                } else if ($this->session->flashdata('message-warning')) {
                    $alertclass = "warning";
                } else if ($this->session->flashdata('message-info')) {
                    $alertclass = "info";
                } else if ($this->session->flashdata('message-danger')) {
                    $alertclass = "danger";
                }
                if ($this->session->flashdata('message-' . $alertclass)) {
                    $messages = $this->session->flashdata('message-' . $alertclass);
                    if (is_array($messages)) {

                        foreach ($messages as $message) { ?>
                            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                <div class="text-center alert alert-<?php echo $alertclass; ?>">
                                    <?php echo $message; ?>
                                </div>
                            </div>
                            <?php
                        }
                    } else { ?>
                        <div class="col-lg-12 d-flex align-items-center justify-content-center">
                            <div class="text-center alert alert-<?php echo $alertclass; ?>">
                                <?php echo $messages; ?>
                            </div>
                        </div>
                    <?php }
                }?>
            </div>
        </section>

        <section class="hero-section">
            <div class="container">
                <div class="necesitas-section">
                   
                    <div class="row align-items-center gy-4 justify-content-center">
                        <div class="col-lg-6 col-12">
                            <div class="necesitas-heading">
                                <h2><strong><?php echo _l('schedule'); ?> </strong><?php echo _l('faster_and_neater'); ?></h2>
                            </div>
                            <div class="necesitas-title">
                                <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/Grupo-2 (3).png'); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-1"></div>

                         
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="panel panel-default">
                                <div class="necesitas-registration-heading signup-registration-heading">
                                    <span><?php echo _l('clinet_sign_up'); ?></span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal necesitas-registration-fromd" enctype="multipart/form-data"  method="POST" action="<?php echo  (base_url('frontend_module/signed_up'))?> " >
                                        
                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                                <label class="control-label"><?php echo _l('choose_a_account_name') ?></label>
                                                  <input type="text" required class="form-control main_domain" name="domain" value="" autocomplete="nope"
                                                      aria-autocomplete="none" id="domain" value="<?= (!empty($company_info) ? $company_info->domain : '') ?>" placeholder="<?php echo _l('choose_a_account_name'); ?>">
                                            </div>

                                            <small class="new_error text-danger" id="domain_error"></small>
                                            <?php
                                            if (get_option('saas_server_wildcard') == 'on') {
                                                ?>
                                                <span class="help-block domain_showed text-danger"
                                                    style="display: none"><?= _l('your_app_URL_will_be') ?> <strong
                                                            id="sub_domain" class=""></strong></span>
                                                <?php
                                            }
                                            ?>
                                            <span class="text-danger">
                                                <?= form_error('domain'); ?>
                                            </span>
                                                
                                        </div>  

                                        <div class="form-group">
                                            <div class="col-md-10 offset-1 ">
                                                <label class="control-label"><?php echo _l('Select your package'); ?></label>
                                                <select name="package_id" onchange="get_package_info(this.value)" class="form-control">
                                                    <option value=""><?= _l('select') . ' ' . _l('package') ?></option>
                                                    <?php
                                                    if (!empty($all_packages)) {
                                                        foreach ($all_packages as $v_package) {
                                                            ?>
                                                            <option <?php
                                                            if (isset($package_id)) {
                                                                if ($package_id == $v_package->id) {
                                                                    echo 'selected';
                                                                }
                                                            } ?> value="<?php echo $v_package->id; ?>"><?php echo $v_package->name; ?></option>
                                                        <?php } ?>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger">
                                                    <?= form_error('package_id'); ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div id="billing_cycle">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                            <label class="control-label"><?php echo _l('create_user_name'); ?></label>
                                                <input type="text" class="form-control" value="<?= (!empty($company_info) ? $company_info->name : '') ?>"  required name="name" placeholder="<?php echo _l('write_user_name'); ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                            <label class="control-label check_email"><?php echo _l('enter_your_email'); ?></label>
                                                <input type="email" id="check_email" required class="form-control" name="email" value="<?= (!empty($company_info) ? $company_info->email : '') ?>" placeholder="<?php echo _l('enter_your_email'); ?>">
                                            </div>
                                            <small class="new_error text-danger" id="email_error"></small>
                                            <span class="text-danger">
                                                <?= form_error('email'); ?>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                            <label class="control-label check_email"><?php echo _l('mobile'); ?></label>
                                                <input type="text" required class="form-control" name="mobile" value="<?= (!empty($company_info) ? $company_info->mobile : '') ?>" placeholder="<?php echo _l('enter_your_mobile'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                            <label class="control-label check_email"><?php echo _l('address'); ?></label>
                                                <input type="text" required class="form-control" name="address" value="<?= (!empty($company_info) ? $company_info->address : '') ?>" placeholder="<?php echo _l('enter_your_address'); ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                            <label class="control-label check_email"><?php echo _l('country'); ?></label>
                                            <select name="country" class="form-control select_box">
                                                <?php
                                                $countries = get_all_countries();
                                                if (!empty($countries)): foreach ($countries as $key => $country): ?>
                                                    <option
                                                            value="<?= $country['country_id'] ?>" <?= (!empty($company_info->country) && $company_info->country == $country['short_name'] || get_option('company_country') == $country['short_name'] ? 'selected' : NULL) ?>><?= $country['short_name'] ?>
                                                    </option>
                                                <?php
                                                endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                                    <label class="control-label"><?php echo _l('login_password'); ?></label>
                                                <div class=" d-flex  login-password">
                                                    <input id="password-field" required type="password" class="form-control"
                                                        name="password" value="" placeholder="<?php echo _l('write_user_password'); ?>">
                                                    <span toggle="#password-field"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group Ingresar-button">
                                            <div class=" offset-1">
                                                <button class="col-md-10 col-10 btn btn-outline-info"><?php echo _l('login_get_into'); ?></button>
                                            </div>
                                        </div>

                                        <div class="form-bottom-content">
                                            <span>?<?php echo _l('are_you_registered_user'); ?>? <a href="<?php echo site_url('client/login'); ?>"><?php echo _l('log_in'); ?></a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            $this->load->view('footer');
        ?>
        
    </div>

    <?php if (empty($register)) { ?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('close') ?></button>
    </div>
    <?php }
        echo form_close();
        $default_url = preg_replace('#^https?://#', '', rtrim(companyBaseUrl(), '/'));
    ?>

    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/jquery-3.6.2.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/main.js'); ?>"></script>
   
    <script type="text/javascript">
        'use strict';
        // click to show_password with icon
        // document.on keyup
        $(document).on('keyup', '.main_domain', function () {
            var sub_domain = $(this).val();
            // remove space,special character,dot from sub_domain and replace with -
            sub_domain = sub_domain.replace(/\s+/g, '_').replace(/[^a-zA-Z0-9]/g, '-').replace(/\./g, '');
            // subdomain should be lowercase
            sub_domain = sub_domain.toLowerCase();

            var main_domain = "<?= $default_url?>";
            // remove www from main_domain
            main_domain = main_domain.replace('www.', '');
            var http = "<?= (isset($_SERVER['HTTPS']) ? "https://" : "http://")?>";
            const url = http + sub_domain + '.' + main_domain;
            $('#sub_domain').html(url);
            var domainDiv = $('.domain_showed');
            if ($(this).val() === "") {
                // remove style display none
                domainDiv.css("display", "none");
            } else {
                domainDiv.css("display", "block");
            }
            check_already_exists('domain', sub_domain);
        });
        // check_email_exists
        $(document).on('keyup', '#check_email', function () {
            var email = $(this).val();
            check_already_exists('email', email);
        });

        function check_already_exists(csrf_token_name ,type, value) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>saas/gb/check_already_exists",
                data: {type, value},
                dataType: "json",
                success: function (data) {
                    if (data.status == 'error') {
                        $('#' + type + '_error').html(data.message);
                        $('#btn_companies').attr('disabled', true);
                    } else {
                        $('#btn_companies').attr('disabled', false);
                        $('#' + type + '_error').html('');
                    }
                }
            });
        }

        // check package_id is empty or not by name
        $(document).ready(function () {
            var package_id = '<?php echo $package_id; ?>';
            // if package_id is not empty then trigger onchange event
            if (package_id != '') {
                get_package_info(package_id, 'monthly_price');
            }
        });

        function get_package_info(package_id, package_type = 'monthly_price', company_id = '') {
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>saas/gb/get_package_info',
                data: {package_id, package_type, company_id, front: true},
                dataType: "json",
                success: function (result) {
                    $('.package-name').html(result.package_info.name);
                    $('#billing_cycle').html(result.package_form_group);
                    $('#package_info').html(result.package_details);
                }
            });
        }
    </script>
    
</body>