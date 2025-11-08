<?php get_header(); ?>
<?php 
$magine_term_id = get_queried_object()->term_id;
$magine_header_img = get_term_meta( $magine_term_id, 'magine_cmb2_cat_cover_image', true );
if (empty($magine_header_img)) {
    $magine_header_img = get_theme_mod('magine_default_header_img');
}
$magine_blog_layout = get_term_meta( $magine_term_id, 'magine_cmb2_cat_layout', true );
if (empty($magine_blog_layout)) {
    $magine_blog_layout = 'magine-two-columns';
}
$magine_post_layout = get_term_meta( $magine_term_id, 'magine_cmb2_cat_card_style', true );
if (empty($magine_post_layout)) {
    $magine_post_layout = 'masonry';
}
$magine_masonry_spacing = get_term_meta( $magine_term_id, 'magine_cmb2_cat_masonry_spacing', true );
if (empty($magine_masonry_spacing)) {
    $magine_masonry_spacing = 'medium-grid';
}
$magine_cat_sidebar = get_term_meta( $magine_term_id, 'magine_cmb2_cat_sidebar', true );
if (empty($magine_cat_sidebar)) {
    $magine_cat_sidebar = 'yes';
}
?>
<div id="magine-page-title" data-img="<?php echo esc_url($magine_header_img); ?>">
    <div class="container">
        <?php the_archive_title( '<h1>', '</h1>' ); ?>
        <?php
        if (get_the_archive_description()) {
            the_archive_description( '<div class="magine-page-subtitle">', '</div>' );
        }
        ?>
    </div>
    <?php if ($magine_header_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<main id="magine-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if ((is_active_sidebar('magine_main_sidebar')) && ($magine_cat_sidebar == 'yes')) { ?>col-xl-9<?php } ?>">
                <?php do_action('magine_before_posts'); ?> 
                <div class="magine-masonry-grid <?php echo esc_attr($magine_masonry_spacing); ?>">
                    <div class="<?php echo esc_attr($magine_blog_layout); ?>" data-columns>
                        <?php while(have_posts()) : the_post(); ?>
                        <?php get_template_part( 'templates/' . $magine_post_layout, 'template'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php if ( (get_next_posts_link()) || (get_previous_posts_link())) : ?>
                <div class="magine-pager">
                    <?php magine_pagination(); ?>
                </div> 
                <div class="clearfix"></div>    
                <?php endif; ?>
                <?php do_action('magine_after_posts'); ?> 
            </div>
            <?php if ((is_active_sidebar('magine_main_sidebar')) && ($magine_cat_sidebar == 'yes')) { ?>
            <aside class="col-12 col-xl-3 mt-5 mt-xl-0">
                <?php dynamic_sidebar( 'magine_main_sidebar' ); ?>
            </aside>
            <?php } ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>