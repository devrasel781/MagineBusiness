<div id="magine-related-posts-wrapper">
<?php
$magine_blog_related_at_most = get_theme_mod('magine_blog_related_at_most', 6);  
$magine_related_by = get_theme_mod('magine_related_by', 'category');  
$magine_related_title = get_theme_mod('magine_related_title');  
$magine_related_layout = get_theme_mod('magine_related_layout', 'magine-two-columns');    
    
$terms = get_the_terms( get_the_ID(), $magine_related_by );
$term_list = wp_list_pluck( $terms, 'slug' );
$related_args = array(
	'post_type' => 'post',
	'posts_per_page' => $magine_blog_related_at_most,
	'post_status' => 'publish',
	'post__not_in' => array(get_the_ID()),
	'orderby' => 'rand',
	'tax_query' => array(
		array(
			'taxonomy' => $magine_related_by,
			'field' => 'slug',
			'terms' => $term_list
		)
	)
);
$magine_query_result = new WP_Query( $related_args );
?>

<h3><?php echo esc_html($magine_related_title); ?></h3>
<div class="magine-masonry-grid related-grid">
    <div class="<?php echo esc_attr($magine_related_layout); ?>" data-columns>
        <?php while($magine_query_result->have_posts()) : $magine_query_result->the_post(); ?>
        <div class="magine-related-post">
            <?php if (has_post_thumbnail()) { ?>
            <?php
            $magine_thumb_id = get_post_thumbnail_id();
            $magine_thumb_url_array = wp_get_attachment_image_src($magine_thumb_id, 'thumbnail', true);
            $magine_thumb_url = $magine_thumb_url_array[0];
            ?>
            <div class="magine-related-post-left">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($magine_thumb_url); ?>" alt="<?php the_title_attribute(); ?>" />   
                </a>
            </div>
            <?php } ?>
            <div class="magine-related-post-right">
                <a class="magine-related-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <a class="magine-related-post-date" href="<?php the_permalink(); ?>"><i class="far fa-clock"></i> <?php the_time(get_option('date_format')); ?></a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</div>  
<?php wp_reset_postdata(); ?>