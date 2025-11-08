<?php	
/*
Template Name: Blog - 4 Column
*/
?>
<?php get_header(); ?>
<?php 
$magine_subtitle = get_post_meta( get_queried_object_id(), 'magine_cmb2_subtitle', true ); 
$magine_header_img = get_post_meta( get_queried_object_id(), 'magine_cmb2_bg_image', true );
if (empty($magine_header_img)) {
    $magine_header_img = get_theme_mod('magine_default_header_img');
}
?>
<?php
if ( get_query_var( 'paged' ) ) { $magine_paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page' ) ) { $magine_paged = get_query_var( 'page' ); } else { $magine_paged = 1; }
$magine_post_per_page = get_theme_mod( 'magine_4_column_at_most', 12 );
$magine_custom_query = new WP_Query( 
    array('post_type' => 'post', 'posts_per_page' => $magine_post_per_page, 'paged' => $magine_paged) 
);
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
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php do_action('magine_before_posts'); ?> 
        <div class="magine-masonry-grid small-grid">
            <div class="magine-four-columns" data-columns>
                <?php while($magine_custom_query->have_posts()) : $magine_custom_query->the_post(); ?>
                <?php get_template_part( 'templates/xsmasonry', 'template'); ?>
                <?php endwhile; ?>
            </div>
        </div>
        <?php if ( $magine_custom_query->max_num_pages > 1 ) : ?>
        <div class="magine-pager">
            <?php magine_custom_pagination($magine_custom_query); ?>
        </div> 
        <div class="clearfix"></div>    
        <?php endif; ?> 
        <?php wp_reset_postdata(); ?>
        <?php do_action('magine_after_posts'); ?> 
    </div>
</main>
<?php get_footer(); ?>