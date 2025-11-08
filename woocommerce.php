<?php get_header(); ?>
<?php
$magine_shop_cover_img = get_theme_mod('magine_shop_cover_img');
?>
<div id="magine-page-title" data-img="<?php echo esc_url($magine_shop_cover_img); ?>">
    <div class="container">
        <h1>
        <?php
        if(is_product()) {
            the_title();
        } else {
            woocommerce_page_title();
        } ?>
        </h1>
        <?php 
        $breadcrumb_args = array(
			'delimiter' => '<i class="fas fa-angle-right"></i>'
	    );
        woocommerce_breadcrumb($breadcrumb_args); 
        ?>
    </div>
    <?php if ($magine_shop_cover_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<main id="magine-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if (( is_active_sidebar( 'magine_woo_sidebar' ) ) && (!is_product())) { ?>col-xl-9<?php } ?>">
                <?php woocommerce_content(); ?>
                <div class="clearfix"></div>
            </div>
            <?php if (( is_active_sidebar( 'magine_woo_sidebar' ) ) && (!is_product())) { ?>
            <aside class="col-12 col-xl-3 mt-5 mt-xl-0">
                <?php dynamic_sidebar( 'magine_woo_sidebar' ); ?>
            </aside>
            <?php } ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>