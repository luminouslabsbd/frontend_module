<?php 
 $this->load->view('header');
?>
<body>
    <div class="main">
        
        <?php $this->load->view('menu');   ?> 

        <section class="hero-section">
            <div class="container">
                <div class="row gy-4 inner-hero-section">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="hero-section-content">
                            <h2> <?php echo _l('home_title_1') ?>, <strong> <?php echo _l('home_title_2') ?></strong></h2>
                            <P class="hero-section-paragraph"><?php echo _l('home_sub_title') ?> </P>
                        </div>
                        <div class="comenzer-button tex-center">
                            <button class="btn btn"><?php echo _l('home_slide_button') ?> </button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="hero-section-image">
                            <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/mejor-gestion.png'); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="Funciones-section">
            <div class="container">
                <div class="Funciones-title">
                    <h2><?php echo _l('funciones') ?> <strong><?php echo _l('pensadas_en_ti') ?></strong></h2>
                    <p><?php echo _l('home_page_details') ?>.</p>
                </div>
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wrapper-Funciones-card-item">
                            <div class="Funciones-card-item">
                                <div class="Funciones-image">
                                    <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/responsive icon.svg'); ?>" alt="">
                                </div>
                                <div class="Funciones-card-title">
                                    <h4><?php echo _l('section_1_title') ?> </h4>
                                    <p><?php echo _l('section_1_title_details') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wrapper-Funciones-card-item">
                            <div class="Funciones-card-item">
                                <div class="Funciones-image">
                                    <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/landing icon.svg'); ?>" alt="">
                                </div>
                                <div class="Funciones-card-title">
                                    <h4><?php echo _l('section_2_title') ?> </h4>
                                    <p><?php echo _l('section_2_title_details') ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wrapper-Funciones-card-item">
                            <div class="Funciones-card-item">
                                <div class="Funciones-image"> 
                                    <img src=" <?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/cuadricula icon.svg'); ?>" alt="">
                                </div>
                                <div class="Funciones-card-title">
                                    <h4><?php echo _l('section_3_title') ?></h4>
                                    <p><?php echo _l('section_3_title_details') ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="descubre-section">
            <div class="container">
                <div class="descubre-heading">
                    <h2><strong><?php echo _l('discover') ?></strong> <?php echo _l('discover_title') ?> <b><?php echo _l('discover_title_1') ?></b></h2>
                </div>

                <div class="wrapper-descubre">
                    <div class="row gy-4 justify-content-center align-items-center">
                        <div class="col-lg-6  col-12">
                            <div class="administrador-item">
                                <div class="administrador-heading">
                                    <h4><?php echo _l('administrador_heading_item_1') ?></h4>
                                </div>
                            </div>
    
                            <div class="administrador-item">
                                <div class="administrador-heading">
                                    <h4><?php echo _l('administrador_heading_item_2') ?></h4>
                                </div>
                            </div>
    
                            <div class="administrador-item">
                                <div class="administrador-heading">
                                    <h4><?php echo _l('administrador_heading_item_3') ?></h4>
                                </div>
                            </div>
    
                            <div class="administrador-item">
                                <div class="administrador-heading">
                                    <h4><?php echo _l('administrador_heading_item_4') ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="administrador-image">
                                <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/administracion.svg'); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="teabaja-section">
            <div class="container">
                <div class="teabaja-heading">
                    <h2><?php echo _l('teabaja_heading') ?>  <strong><?php echo _l('teabaja_heading_br') ?> </strong></h2>
                    <p><?php echo _l('get_started_with_keos') ?></p>
                </div>

                <div class="teabaja-wapper">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="teabaja-card-item">
                                <div class="teabaja-content">
                                    <h4><?php echo _l('teabaja_card_item_1') ?></h4>
                                </div>
                                <div class="teabaja-user-img">
                                    <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/clientes potenciales icon.svg'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="teabaja-card-item">
                                <div class="teabaja-content">
                                    <h4><?php echo _l('teabaja_card_item_2') ?></h4>
                                </div>
                                <div class="teabaja-user-img">
                                    <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/payment-center 1.svg'); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="necesidades-section">
            <div class="container">
                <div class="necesidades-heading">
                    <h2><?php echo _l('footer_section_text_1') ?> <strong> <?php echo _l('footer_section_text_2') ?> </strong><?php echo _l('footer_section_text_3') ?></h2>
                    <p><?php echo _l('footer_question') ?></p>
                </div>

                <div class="necesidades-button">
                    <button class="btn btn"><?php echo _l('footer_question_button') ?></button>
                </div>
            </div>
        </section>

        <?php 
            $this->load->view('footer');
        ?>
        
    </div>

    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/js/main.js'); ?>"></script>
    
</body>
