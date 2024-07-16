<footer>
    <div class="container">
        <div class="main-footer-section">
            <div class="footer-logo">
                <img src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/Icon - footer - keos@2x.png'); ?>" alt="">
            </div>
            <div class="footer-list-item">
                <ul>
                    <li><a href=""><?php echo _l('footer_category_1') ?></a></li>
                    <li><a href="<?php echo site_url('frontend_module/ll_plans'); ?>"><?php echo _l('footer_category_2') ?></a></li>
                    <li><a href=""><?php echo _l('footer_category_3') ?></a></li>
                    <li><a href=""><?php echo _l('footer_category_4') ?></a></li>
                    <li><a href=""><?php echo _l('footer_category_5') ?></a></li>
                    <li><a href=""><?php echo _l('footer_category_6') ?></a></li>
                    <li><a href=""><?php echo _l('footer_category_7') ?></a></li>
                    <li><a class="text-underline" href=""><?php echo _l('footer_category_8') ?></a></li>
                </ul>
            </div>

            <div class="social-media-icons">
                <span><?php echo _l('footer_follow') ?></span>
                <ul>
                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    <li><a href=""><i class="fab fa-tiktok"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="inner-footer">
            <div class="wrapper-footer">
                <div class="footer-image">
                    <span><img class="google-image" src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/google-icon-logo.svg'); ?>" alt="">Google
                        <br>Partner</span>
                    <span><img class="iso-image" src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/iso-27001-information-security.webp'); ?>" alt="">
                        27001</span>
                    <span><img class="pci-image" src="<?php echo module_dir_url('frontend_module', 'assets/ll_asset/assets/img/Trazado 978@2x.png'); ?>" alt=""> DSS <br>
                        Certified</span>
                </div>
                <div class="copyright-content">
                    <p><?php echo _l('footer_copyright') ?> </p>
                </div>
                <div class="politica-content">
                    <p><?php echo _l('footer_information_security_policy') ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>

    function change_contact_language_ll(element) {
        var path = "<?php echo site_url('frontend_module/change_language_ll/'); ?>" + $(element).val();
        window.location.href = path;
    }

        
</script>
