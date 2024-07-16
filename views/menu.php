<header class="inner-header-section">
            <div class="container">
                <div class="header-section">
                    <div class="header-wrapper">
                        <div class="header-logo">
                            <a href="<?php echo site_url('home'); ?>">
                                <h1>KEOS CRM</h1>
                            </a>
                        </div>
                        <?php 
                          $current_page = $_SERVER['REQUEST_URI']
                        ?>
                        <div class="header-list-item">
                            <ul class="">
                                <li><a href="<?php echo site_url('home'); ?>" class="<?php echo ($current_page == '/home') ? 'active' : ''; ?>" >Home</a></li>
                                <li><a href="<?php echo site_url('saas/plans'); ?>" class="<?php echo ($current_page == '/saas/plans') ? 'active' : ''; ?>"  ><?php echo _l('footer_category_2')?></a></li>
                                <li class="language-button">
                                <?php if (!is_language_disabled()) { ?>
                                    <div class="form-group ">
                                        </label>
                                        <select name="language" id="language" class="form-control selectpicker"
                                            onchange="change_contact_language_ll(this)"
                                            data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>"
                                            data-live-search="true">
                                            <?php $selected = (get_contact_language() != '') ? get_contact_language() : get_option('active_language'); ?>
                                            <?php foreach ($this->app->get_available_languages() as $availableLanguage) { ?>
                                            <option value="<?php echo $availableLanguage; ?>"
                                                <?php echo ($availableLanguage == $selected) ? 'selected' : '' ?>>
                                                <?php echo ucfirst($availableLanguage); ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            <?php } ?>
                        </li>
                        <a href="<?php echo site_url('saas/signup'); ?>" ><button class="btn btn-outline-info sign-up-button <?php echo ($current_page == '/saas/signup') ? 'active' : ''; ?>"><?php echo _l('clinet_sign_up')?></button></a>
                        <a href="<?php echo site_url('client/login'); ?>" ><button
                                class="btn btn-outline-info login-button <?php echo ($current_page == '/client/login') ? 'active' : ''; ?>"><?php echo _l('log_in')?></button></a>
                    </ul>

                    <div class="mobile-menu">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#rightOffcanvas" aria-controls="rightOffcanvas">
                            <i class="fas fa-bars"></i></button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="rightOffcanvas"
                            aria-labelledby="rightOffcanvasLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="rightOffcanvasLabel"></h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="mobile-menu-items">
                                    <span class="mobile-menu-items">
                                        <a href="<?php echo site_url('home'); ?>" class="<?php echo ($current_page == '/home') ? 'active' : ''; ?>">Home</a>
                                    </span>
                                    <span class="mobile-menu-items">
                                        <a href="<?php echo site_url('saas/plans'); ?>" class="<?php echo ($current_page == '/saas/plans') ? 'active' : ''; ?>" ><?php echo _l('footer_category_2')?></a>
                                    </span>
                                    <span class="mobile-menu-items menu-selectpicker">
                                    <select name="language" id="language" class="form-control selectpicker"
                                        onchange="change_contact_language(this)"
                                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>"
                                        data-live-search="true">
                                        <?php $selected = (get_contact_language() != '') ? get_contact_language() : get_option('active_language'); ?>
                                        <?php foreach ($this->app->get_available_languages() as $availableLanguage) { ?>
                                        <option value="<?php echo $availableLanguage; ?>"
                                            <?php echo ($availableLanguage == $selected) ? 'selected' : '' ?>>
                                            <?php echo ucfirst($availableLanguage); ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    </span>

                                    <span class="mobile-menu-items">
                                        <a href="<?php echo site_url('saas/signup'); ?>"><button
                                                class="btn btn-outline-info mobile-menu-sign-up-button <?php echo ($current_page == '/saas/signup') ? 'active' : ''; ?>">
                                                <?php echo _l('clinet_sign_up')?></button>
                                        </a>
                                    </span>

                                    <span class="mobile-menu-items">
                                        <a href="<?php echo site_url('client/login'); ?>"><button
                                                class="btn btn-outline-info mobile-menu-login-button <?php echo ($current_page == '/client/login') ? 'active' : ''; ?>"><?php echo _l('log_in')?></button></a>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>