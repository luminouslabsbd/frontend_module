<?php  $this->load->view('header'); ?>
    
<body>
    <div class="main">
        
        <?php $this->load->view('menu');   ?>    

        <section class="hero-section">
            <div class="container-fluid">
                <div class="pracing-title">
                    <h1><?php echo _l('plan_chose') ?><strong> PLAN</strong> <?php echo _l('plan_chose_what') ?></h1>
                </div>

                <div class="text-center">
                    <ul class="nav nav-pills rounded-pill justify-content-center d-inline-block border py-1 px-2"
                        id="pills-tab" role="tablist">
                        <?php

                        foreach ($billing_cycle as $key => $value) {
                            $offer = '';
                            $coupons = get_coupon_by_package_type($value['name']);
                            if (!empty($coupons) && $coupons->package_type == $value['name']) {
                                // coupon type 1 is percentage and 2 is fixed amount
                                if ($coupons->type == 1) {
                                    $offer = $coupons->amount . '%' . ' ' . _l('off');
                                } else {
                                    $offer = $coupons->amount . ' ' . _l('off');
                                }
                            }
                            ?>
                            <button type="button"
                                    onclick="get_price(this)"
                                    class="btn get_price <?= $value['class'] ?> rounded-pill"
                                    name="<?= $value['value'] ?>"><?= _l($value['name']) ?>
                                <?php
                                if (!empty($offer)) {
                                    ?>
                                    <span class="badge rounded-pill bg-danger"><?= $offer ?></span>
                                    <?php
                                }
                                ?>
                            </button>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="pracing-table">
                <div class="container">
                    <div class="row gy-4 text-center  justify-content-center">
                        <?php foreach($all_packages as $package){ ?>

                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="pricing-card-items">
                                    <div class="pricing-card-title">
                                        <span class="pricing-class-title"><?php echo $package->name ?></span>
                                    </div>

                                    <?php if (!empty($package->monthly_offer)) { ?>
                                        <div class="price-money monthly_price">
                                            <span class="mensualidad-number"><? echo display_money($package->monthly_offer) ?></span>
                                        </div>
                                        <div class="price-money monthly_price">
                                            <span class="mensualidad-number"><?php echo  display_money($package->monthly_price)   ?></span>
                                        </div>
                                    <?php } else {?>
                                        <div class="price-money monthly_price">
                                            <span class="mensualidad-number"><?php echo  display_money($package->monthly_price )  ?></span>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($package->yearly_offer)) { ?>
                                        <div class="price-money  yearly_price d-none">
                                            <span class="mensualidad-number"><? echo display_money($package->yearly_price) ?></span>
                                        </div>
                                        <div class="price-money yearly_price d-none">
                                            <span class="mensualidad-number"><?php  echo  display_money($package->yearly_offer )  ?></span>
                                        </div>
                                    <?php } else {?>
                                        <div class="price-money yearly_price d-none">
                                            <span class="mensualidad-number"><?php  echo  display_money($package->yearly_price)   ?></span>
                                        </div>
                                    <?php } ?>

                                    <div class="price-money lifetime_price d-none">
                                        <span class="mensualidad-number"><?php  echo  display_money($package->lifetime_price)   ?></span>
                                    </div>

                                    <ul class="list-unstyled mb-0 ps-0 pricing-card-icon-content">
                                        <?= saas_packege_list($package, 6, true) ?>
                                    </ul>

                                </div>
                            </div>

                        <?php } ?>
                        
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="funciones">
            <div class="container">
                <div class="main-funcuones-button">
                    <button class="btn btn-info funcuones-wrapper"><?php echo _l('plan_see_more_features') ?> <a href="#">
                            <div class="fa fa-chevron-right rotate"></div>
                        </a></button>
                </div>
                <div class="main-comprar-table">
                    <div class="comprar-planes-heading">
                        <h2><?php echo _l('buy_plan') ?></h2>
                    </div>
                    <div class="comprar-planes-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center"><?php echo _l('essencial') ?></th>
                                    <th scope="col" class="text-center"><?php echo _l('business') ?></th>
                                    <th scope="col" class="text-center"><?php echo _l('enterprise') ?></th>
                                </tr>
                                <tr>
                                    <td colspan="6" class="p-0">
                                        <div class="Plataforma-heading">
                                            <h3><?php echo _l('business_management_module') ?></h3>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('lead_and_sales_funnel') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                 <tr>
                                    <td class="comprar-table-content"><?php echo _l('proposal_and_budget') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('online_contract_signing') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('preparation_and_submission_of_proposals') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('relationship_between_clients_and_contacts') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('fast_contract_management') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_pre_sales_management') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('sales_management') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_credits_customer_and_project_expenses') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

    
                                <tr>
                                    <td colspan="6"  class="p-0">
                                        <div class="Plataforma-heading">
                                            <h3><?php echo _l('project_management') ?></h3>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_1') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                 <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_2') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_3') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_4') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_5') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_6') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_7') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_8') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_9') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('project_management_details_10') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td colspan="6" class="p-0">
                                        <div class="Plataforma-heading">
                                            <h3><?php echo _l('customer_comunication_management') ?></h3>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_comunication_management') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                 <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_comunication_management_1') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td colspan="6" class="p-0">
                                        <div class="Plataforma-heading">
                                            <h3><?php echo _l('customer_comunication_management_2') ?></h3>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_comunication_management_3') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('customer_comunication_management_4') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
    
    
                                <tr>
                                    <td colspan="6"  class="p-0">
                                        <div class="Plataforma-heading">
                                            <h3><?php echo _l('advanced') ?></h3>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_1') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_2') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_3') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_4') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_5') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_6') ?> </td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_7') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_8') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_9') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_10') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_11') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_12') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_13') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_14') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_15') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>

                                <tr>
                                    <td class="comprar-table-content"><?php echo _l('advanced_16') ?></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                    <td class="text-center"><i class="fas fa-check comprar-plans-check-icon"></i></td>
                                </tr>
    
    
                                
                            </thead>
                        </table>
    
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

    <script type="text/javascript">
    'use strict';

    function get_price(value) {
        var price = value.name;
        $('.get_price').removeClass('btn-primary');
        $(value).addClass('btn-primary');
        $('.monthly_price').addClass('d-none');
        $('.yearly_price').addClass('d-none');
        $('.lifetime_price').addClass('d-none');
        $('.' + price).removeClass('d-none');
    }

    // get package details by ajax and show in modal
    function packageDetails(package_id) {
        $.ajax({
            url: "<?= base_url() ?>saas/gb/get_package_info/",
            type: "POST",
            data: {package_id: package_id, front: true},
            dataType: "json",
            success: function (data) {
                $('#package_details').html(data.package_details);
                $('#package_details_modal').modal('show');

            }
        });
    }

    function choosePlan(package_id) {
        var formData = {
            'package_id': package_id,
        };
        $.ajax({
            url: "<?= base_url() ?>saas/gb/signup_company/",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                $('#modal-xl-con').html(data.subview);
                $('#modal-xl').modal('show');
            }
        });
    }

    function getPackageData(package_id, only_details = false) {
        $.ajax({
            url: "<?= base_url() ?>saas/gb/get_package_info/",
            type: "POST",
            data: {package_id: package_id},
            dataType: "json",
            success: function (data) {
                if (only_details) {
                    $('#package_details').html(data.package_details);
                    $('#package_details_modal').modal('show');
                } else {
                    $('#modal-xl-con').html(data.package_details);
                    $('#modal-xl').modal();
                }

            }
        });
    }
</script>
    
</body>