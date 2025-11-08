<?php get_header(); ?>
<?php 
$magine_subtitle = get_post_meta( get_queried_object_id(), 'magine_cmb2_subtitle', true ); 
$magine_header_img = get_post_meta( get_queried_object_id(), 'magine_cmb2_bg_image', true );
if (empty($magine_header_img)) {
    $magine_header_img = get_theme_mod('magine_default_header_img');
}
?>
<div id="magine-page-title" data-img="<?php echo esc_url($magine_header_img); ?>">
    <div class="container">
        <?php the_title('<h1>','</h1>'); ?>
        <?php if (!empty($magine_subtitle)) { ?>
        <p class="magine-page-subtitle"><?php echo esc_html($magine_subtitle); ?></p>
        <?php } ?>
    </div>
    <?php if ($magine_header_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<main id="magine-main-wrapper">
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <?php the_content(); ?>
        <div class="clearfix"></div>
        <?php 
        wp_link_pages( array(
            'before'      => '<div class="magine-page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>'
        ));
        ?>
        <?php comments_template(); ?>
    </div>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>