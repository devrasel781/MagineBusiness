<?php get_header(); ?> 
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php
$magine_header_img = get_post_meta( get_queried_object_id(), 'magine_cmb2_bg_image', true );
$magine_sidebar = get_post_meta( get_queried_object_id(), 'magine_cmb2_sidebar', true );
if (empty($magine_header_img)) {
    $magine_header_img = get_theme_mod('magine_default_header_img');
}
?>
<article <?php post_class("single")?> id="post-<?php the_ID(); ?>">
<div id="magine-page-title" data-img="<?php echo esc_url($magine_header_img); ?>">
    <div class="container">
        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        <?php 
        if (function_exists( 'magine_bootstrap_breadcrumb' )) {
            magine_bootstrap_breadcrumb(); 
        }
        ?>
    </div>
    <?php if ($magine_header_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<div id="magine-main-wrapper">
<div class="container">
    <div class="row">
        <div class="col-12 <?php if (( is_active_sidebar( 'magine_main_sidebar' ) ) && ($magine_sidebar != 'yes')) { ?>col-xl-9<?php } ?>">
        <?php do_action('magine_before_single_post'); ?>    
        <?php $magine_featured_img = get_theme_mod('magine_remove_featured_img'); ?>
        <?php 
        if ((has_post_thumbnail()) && (empty($magine_featured_img)) && (!has_post_format('gallery')) && (!has_post_format('video')) && (!has_post_format('audio')) && (!has_post_format('quote'))) {
            $magine_post_img_id = get_post_thumbnail_id();
            $magine_post_img_array = wp_get_attachment_image_src($magine_post_img_id, 'full', true);
            $magine_post_img = $magine_post_img_array[0];
        ?>
        <div class="magine-featured-img">
            <img class="img-fluid" src="<?php echo esc_url($magine_post_img); ?>" alt="<?php the_title_attribute(); ?>" />
        </div>
        <?php } ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <div class="clearfix"></div>
        <?php 
        wp_link_pages( array(
            'before'      => '<div class="magine-page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>'
        ));
        ?>
        <?php if (!post_password_required()){ ?>
        <div class="magine-meta entry-footer">
            <div class="magine-meta-date">
                <span class="badge badge-dark"><i class="fas fa-clock"></i> <?php the_time(get_option('date_format')); ?></span>
            </div>
            <?php if( has_category() ) { ?> 
            <div class="magine-meta-category">
            <?php
            foreach( get_the_category() as $category ) {
                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '"><span class="badge badge-primary"><i class="fas fa-folder"></i> ' . esc_html($category->name) . '</span></a>';
            }
            ?>
            </div> 
            <?php } ?>
            <?php if( has_tag() ) { ?> 
            <div class="magine-meta-tags">
                <?php the_tags('<span class="badge badge-info"><i class="fas fa-tag"></i> ','</span><span class="badge badge-info"><i class="fas fa-tag"></i> ', '</span>'); ?>
            </div>
            <?php } ?>
        </div>
        <?php 
        $magine_enable_sharing = get_theme_mod('magine_enable_sharing');
        if (( $magine_enable_sharing ) && ( function_exists( 'magine_social_media_buttons' ))) {   
            magine_social_media_buttons();
        }
        ?>
        <?php if (is_singular('post')) { ?>   
        <?php  
        $magine_enable_author_box = get_theme_mod('magine_enable_author_box');                                     
        if ( $magine_enable_author_box ) {   
            get_template_part( 'templates/authorbox', 'template');
        }            
        ?>
        <?php 
        $magine_enable_related = get_theme_mod('magine_enable_related');  
        if ( $magine_enable_related ) { 
            get_template_part( 'templates/related', 'template'); 
        }
        ?>
        <?php
        $magine_post_nav = get_theme_mod('magine_enable_post_nav');                                     
        if ( $magine_post_nav ) {                                      
            get_template_part( 'templates/postnav', 'template');
        }
        ?>
        <?php } ?>    
        <?php do_action('magine_after_single_post'); ?>
        <?php comments_template(); ?>
        <?php } ?>  
        </div>
        <?php if (( is_active_sidebar( 'magine_main_sidebar' ) ) && ($magine_sidebar != 'yes')) { ?>
        <aside class="col-12 col-xl-3 mt-5 mt-xl-0">
            <?php dynamic_sidebar( 'magine_main_sidebar' ); ?>
        </aside>
        <?php } ?>
    </div>
</div>
</div>
</article>    
<?php endwhile; ?>
<?php get_footer(); ?>