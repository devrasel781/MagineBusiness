<div class="magine-post-nav-wrapper">
    <?php if (get_previous_post_link()) { ?>
    <div class="magine-post-nav-left-row">
        <div class="magine-post-nav-link">
            <span><?php esc_html_e("Previous Post", 'magine'); ?></span>
            <?php previous_post_link('<i class="fas fa-arrow-left"></i> %link'); ?>
        </div>
    </div>
    <?php } ?>
    <?php if (get_next_post_link()) { ?>
    <div class="magine-post-nav-right-row">
        <div class="magine-post-nav-link">
            <span><?php esc_html_e("Next Post", 'magine'); ?></span>
            <?php next_post_link('%link <i class="fas fa-arrow-right"></i>'); ?>
        </div>
    </div>
    <?php } ?>
</div>
