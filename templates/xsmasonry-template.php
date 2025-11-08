<div <?php post_class(); ?>>
    <div class="card-masonry card-small">
    <div class="card">
    <?php if (has_post_thumbnail()) { ?>
    <?php
    $magine_thumb_size = get_theme_mod('magine_masonry_thumbnail', 'large');
    $magine_thumb_id = get_post_thumbnail_id();
    $magine_thumb_url_array = wp_get_attachment_image_src($magine_thumb_id, $magine_thumb_size, true);
    $magine_thumb_url = $magine_thumb_url_array[0];
    ?>    
    <a class="card-featured-img" href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_url($magine_thumb_url); ?>" alt="<?php the_title_attribute(); ?>" />   
    </a>    
    <?php } ?>
        <div class="card-body">
            <?php if( has_category() ) { ?> 
            <div class="card-masonry-cats-list">
                <span><?php the_category(',</span> <span>'); ?></span>
            </div> 
            <?php } ?>
            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
        </div>
        <div class="card-footer">
            <div class="magine-cardfooter-author">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?><?php the_author(); ?></a>
            </div>
            <div class="magine-cardfooter-date">
                <a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="far fa-clock"></i> <?php the_time(get_option('date_format')); ?></a>
            </div>
        </div>
    </div> 
</div>
</div>