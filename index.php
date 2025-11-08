<?php get_header(); ?>
<?php $magine_blog_layout = get_theme_mod('magine_blog_layout', 'magine-two-columns'); ?>
<?php $magine_post_layout = get_theme_mod('magine_post_layout', 'masonry'); ?>
<?php $magine_masonry_spacing = get_theme_mod('magine_masonry_spacing', 'medium-grid'); ?>
<?php $magine_hide_sidebar = get_theme_mod('magine_hide_sidebar'); ?>
<?php $magine_blog_subtitle = get_theme_mod('magine_blog_subtitle'); ?>
<?php $magine_default_header_img = get_theme_mod('magine_default_header_img'); ?>
<div id="magine-page-title" data-img="<?php echo esc_url($magine_default_header_img); ?>">
    <div class="container">
        <h1>
            <?php
            if ( is_home() && ! is_front_page() ) {
                single_post_title();
            } else { 
                esc_html_e( 'Blog', 'magine' ); 
            } 
            ?>
        </h1>
        <?php if ($magine_blog_subtitle) { ?>
        <p class="magine-page-subtitle"><?php echo esc_html($magine_blog_subtitle); ?></p>
        <?php } ?>
    </div>
    <?php if ($magine_default_header_img) { ?>
    <div id="magine-header-overlay"></div>
    <?php } ?>
</div>
<main id="magine-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if (( is_active_sidebar( 'magine_main_sidebar' ) ) && (empty($magine_hide_sidebar))) { ?>col-xl-9<?php } ?>">
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
            <?php if (( is_active_sidebar( 'magine_main_sidebar' ) ) && (empty($magine_hide_sidebar))) { ?>
            <aside class="col-12 col-xl-3 mt-5 mt-xl-0">
                <?php dynamic_sidebar( 'magine_main_sidebar' ); ?>
            </aside>
            <?php } ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>