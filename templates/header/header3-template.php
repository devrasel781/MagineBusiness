<header id="magine-header-v2">
<?php $magine_logo = get_theme_mod( 'magine_logo' ); ?>
<?php 
$magine_sticky = get_theme_mod( 'magine_sticky_menu' ); 
    if ($magine_sticky) {
        $magine_sticky = 'sticky-top';
    }
?>
<div id="magine-header">
    <div class="container">
        <div class="row align-items-center">
            <div id="magine-main-logo" class="col-12 col-md-4 order-2 order-md-1">
                <div itemscope itemtype="http://schema.org/Brand">
                    <?php if ($magine_logo) { ?>
                    <a class="magine-logo-link" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <img src="<?php echo esc_url($magine_logo); ?>" class="magine-logo" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
                    </a>
                    <?php } else { ?>
                    <a class="magine-logo-link" href="<?php echo esc_url(home_url( '/' )); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . "/images/logo.png"); ?>" class="magine-logo" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-8 ml-auto order-1 order-md-2"> 
                <?php do_action('magine_header_banner'); ?>
            </div>
        </div>
    </div>
</div>
    <nav id="magine-header-menu" class="navbar navbar-expand-lg navbar-dark <?php echo esc_attr($magine_sticky); ?>">
        <div class="container">
            <?php if ( has_nav_menu( 'magine-main-menu' ) ) { ?>
            <div id="navbar-toggler" class="navbar-toggler collapsed" role="button" data-toggle="collapse" data-target="#magine-main-menu" aria-controls="magine-main-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'magine' ); ?>">
                <span class="fas fa-bars"></span> <?php esc_attr_e( 'MENU', 'magine' ); ?>
            </div>
            <div id="magine-main-menu" class="collapse navbar-collapse">
            <?php
            wp_nav_menu([
                'menu'            => '',
                'theme_location'  => 'magine-main-menu',
                'container'       => '',
                'container_id'    => '',
                'container_class' => '',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav navbar-nav-hover justify-content-start',
                'depth'           => 3,
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'walker'          => new WP_Bootstrap_Navwalker()
            ]);
            ?>
            <?php } ?>
            
            <div class="magine-top-icons justify-content-end">
                    <?php $magine_fullscreen_search = get_theme_mod( 'magine_fullscreen_search' ); ?>
                    <?php if ($magine_fullscreen_search) { ?>
                    <div class="magine-top-woo-icon"><a id="magine-open-search" href="#"><i class="fas fa-search"></i></a></div>
                    <?php } ?>
                    <?php if ( class_exists( 'woocommerce' ) ) { ?>
                    <div id="magine-woo-btn-account" class="magine-top-woo-icon">
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><i class="fas fa-user-alt"></i></a>
                    </div>
                    <div id="magine-woo-btn-cart" class="magine-top-woo-icon">
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-bag"></i><span class="icon-count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span></a>
                    </div>
                    <?php } ?>  
                    <?php if ( is_active_sidebar( 'magine_slidein_sidebar' ) ) { ?>
                    <div class="magine-top-woo-icon"><a href="#magine-panel" class="magine-panel-open"><i class="fas fa-bars"></i></a></div>
                    <?php } ?>    
                </div>
            </div>
        </div>
    </nav>    
</header>