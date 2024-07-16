<!DOCTYPE html>
<html lang="en">

<?php  $this->load->view('header'); ?>
<body>
    <div class="main">

       <?php $this->load->view('menu');   ?> 

        <section class="hero-section">
            <div class="container">
                <div class="organized-login-section">
                    <div class="row align-items-center text-center gy-4 justify-content-center">
                        <div class="col-lg-6 col-12">
                            <div class="organized-login-heading">
                                <h2><strong><?php echo _l('footer_category_7') ?></strong> <?php echo _l('faster_and_neater') ?></h2>
                            </div>
                            <div class="organized-login-img">
                                <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/sign-in-email-image.png'); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-1"></div>


                        <div class="col-lg-5 col-md-8 col-12">
                            <div class="panel organized-login-panel-default">
                                <div class="organized-login-registration-heading ">
                                    <span><?php echo _l('login_title') ?></span>
                                </div>
                                <div class="panel-body">
                                    <?php $this->load->view('authentication/includes/alerts'); ?>
                                    <form class="form-horizontal organized-login-registration-fromd" method="POST"
                                        action="<?php echo site_url('admin/authentication'); ?>">
                                        <div class="form-group">
                                            <div class="col-md-12 organized-login-wrapper">
                                                <label class="control-label"><?php echo _l('login_corp_email') ?></label>
                                                <input type="email" required class="form-control" name="email" value=""
                                                    placeholder="<?php echo _l('write_user_password') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-md-12 organized-login-wrapper">
                                                <label class="control-label"><?php echo _l('login_password') ?></label>
                                                <div class=" d-flex  organized-login-password">
                                                    <input id="password-field" type="password"  required class="form-control"
                                                        name="password" value="secret"
                                                        placeholder="<?php echo _l('write_user_password') ?>">
                                                    <span toggle="#password-field"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-grouporganized-login-form-bottom-content">
                                            <div class="grouporganized-link">
                                                <span><a href="<?php echo site_url('admin/authentication/forgot_password'); ?>"><?php echo _l('login_forget_password') ?> </a></span>
                                            </div>
                                            <div class="organized-login-button">
                                                <button class="col-md-12 col-10 btn btn-outline-info"><?php echo _l('login_get_into') ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php  $this->load->view('footer'); ?>
        
    </div>

    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/jquery-3.6.2.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/main.js'); ?>"></script>
    
</body>