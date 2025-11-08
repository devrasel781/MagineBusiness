<?php get_header(); ?>
<?php $magine_header_img = get_theme_mod('magine_default_header_img'); ?>
<div id="magine-page-title" data-img="<?php echo esc_url($magine_header_img); ?>">
    <div class="container">
        <?php the_title('<h1>','</h1>'); ?>
    </div>
    <?php if ($magine_header_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<main id="magine-main-wrapper">
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if ( is_active_sidebar( 'magine_bbpress_sidebar' ) && !bbp_is_single_user()) { ?>col-xl-9<?php } ?>">
                <?php the_content(); ?>
                <div class="clearfix"></div>
            </div>
            <?php if ( is_active_sidebar( 'magine_bbpress_sidebar' ) && !bbp_is_single_user()) { ?>
            <aside class="col-12 col-xl-3 mt-5 mt-xl-0">
                <?php dynamic_sidebar( 'magine_bbpress_sidebar' ); ?>
            </aside>
            <?php } ?>
        </div>
    </div>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>