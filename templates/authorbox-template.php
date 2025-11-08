<div class="magine-author-tabs">
    <ul class="nav nav-tabs">
        <li class="nav-item" id="tab-title-1">
            <a href="#author-tab-1" class="nav-link active" aria-expanded="true" data-toggle="tab"><span><?php esc_html_e( 'About The Author', 'magine'); ?></span></a>
        </li>
        <li class="nav-item" id="tab-title-2">
            <a href="#author-tab-2" class="nav-link" aria-expanded="false" data-toggle="tab"><span><?php esc_html_e( 'Latest Posts', 'magine'); ?></span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="author-tab-1" aria-expanded="true">
            <div class="magine-author-box">
                <div class="magine-author-avatar">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></a>
                </div>
                <div class="magine-author-meta">
                    <h3><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a></h3>
                    <div class="magine-author-desc">
                        <?php echo wp_kses_post(wpautop(get_the_author_meta('description'))); ?>
                    </div>
                    <div class="magine-author-links">
                        <div class="magine-top-icons magine-author-box-icons">
                                <?php $magine_author_icons = get_user_meta( get_the_author_meta( 'ID' ), 'magine_cmb2user_icons', true ); ?> 
                                <?php if (!empty($magine_author_icons)) { ?>
                                    <?php 
                                    foreach ($magine_author_icons as $entry) {
                                    $icon = $destination = '';
                                    if ( isset( $entry['magine_cmb2iconimg'] ) ) {            
                                        $icon = $entry['magine_cmb2iconimg'];
                                    }
                                    if ( isset( $entry['magine_cmb2iconlink'] ) ) {            
                                        $destination = $entry['magine_cmb2iconlink'];
                                    }   
                                    ?>
                                    <div class="magine-top-woo-icon"><a href="<?php echo esc_url($destination); ?>" target="_blank"><i class="fab fa-<?php echo esc_attr($icon); ?>"></i></a></div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="tab-pane fade" id="author-tab-2" aria-expanded="false">
        <?php
        $magine_authors_posts_at_most = get_theme_mod('magine_authors_posts_at_most', 6); 
        $magine_authors_posts_layout = get_theme_mod('magine_authors_posts_layout', 'magine-two-columns');    

        $related_args = array(
            'post_type' => 'post',
            'posts_per_page' => $magine_authors_posts_at_most,
            'post_status' => 'publish',
            'post__not_in' => array(get_the_ID()),
            'author' => get_the_author_meta( 'ID' ),
            'order' => 'DESC',
            'orderby' => 'post_date'
        );
        $magine_query_result = new WP_Query( $related_args );
        ?>
            <div class="magine-masonry-grid related-grid">
                <div class="<?php echo esc_attr($magine_authors_posts_layout); ?>" data-columns>
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
            <?php wp_reset_postdata(); ?>
            <div class="magine-author-box-btn">
                <a class="btn btn-sm btn-primary" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php esc_html_e( 'VIEW ALL POSTS BY', 'magine'); ?> <?php the_author(); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
</div>
