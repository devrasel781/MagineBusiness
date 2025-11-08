<div class="clearfix"></div>
<?php do_action('magine_before_footer'); ?>
<div class="clearfix"></div>
<footer id="magine-footer">
    <?php if ( is_active_sidebar( 'magine_footer_widgets' ) || is_active_sidebar( 'magine_footer2_widgets' ) || is_active_sidebar( 'magine_footer3_widgets' ) ) { ?>
    <?php $magine_footer_layout = get_theme_mod('magine_footer_layout', '3'); ?>
    <div id="footer-widgets">
        <div class="container">
            <div class="row">
                <?php get_template_part( 'templates/footer/' . $magine_footer_layout, 'template'); ?> 
            </div>
        </div>
    </div>
    <?php } ?>
    <?php $magine_footer_icons = get_theme_mod( 'magine_footer_icons' ); ?> 
    <?php $magine_footermessage = get_theme_mod('magine_footermessage'); ?>
    <?php if ((!empty($magine_footer_icons)) || ($magine_footermessage)) { ?>
    <div id="magine-footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 order-2 order-md-1">
                    <?php if ($magine_footermessage) { ?>
                    <p><?php echo wp_kses_post($magine_footermessage); ?></p>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <?php get_template_part( 'templates/footericons', 'template'); ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php } ?>
</footer>
<?php get_template_part( 'templates/panel', 'template'); ?>
<?php get_template_part( 'templates/searchfw', 'template'); ?>
<?php wp_footer(); ?>
</body>
</html>