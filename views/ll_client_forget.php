<?php  $this->load->view('header'); ?>

<body>
    <div class="main">
        
        <?php $this->load->view('menu');   ?>    

        <section class="hero-section">
            <div class="container">
                <div class="necesitas-section">
                    <div class="contrasena-heading">
                        <h2><?php echo _l('forget_password_question'); ?></h2>
                    </div>
                    <div class="row align-items-center gy-4 justify-content-center">
                        <div class="col-lg-6 col-12">
                            <div class="necesitas-title">
                                <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/login-page.png'); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="panel panel-default">
                                <div class="necesitas-registration-heading">
                                    <span><?php echo _l('forget_password_text'); ?></span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal necesitas-registration-fromd"  method="POST" action="<?php echo site_url('client/forget'); ?>">
                                        <div class="form-group">
                                            <div class="col-md-10 offset-1">
                                                <?php if ($this->session->flashdata('message-danger')) { ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo $this->session->flashdata('message-danger'); ?>
                                                    </div>
                                                <?php } ?>
                                                
                                            <label class="control-label"><?php echo _l('login_corp_email'); ?></label>
                                                <input  required type="email" class="form-control" name="email" value="" placeholder="<?php echo _l('enter_your_email'); ?>">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group Ingresar-button">
                                            <div class="login-page"> 
                                                <button class="col-md-10 col-10 btn btn-outline-info"><?php echo _l('forget_recover_password'); ?></button>
                                            </div>
                                            <a href="<?php echo site_url('client/login'); ?>" class="Registrate-link"><?php echo _l('have_acount'); ?> <span><?php echo _l('sign_up_here'); ?></span></a>
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