<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
    <div class="input-group">
    <input type="text" class="form-control" placeholder="<?php esc_attr_e('Enter a keyword...', 'magine'); ?>" name="s" />
    <?php $magine_search_exclude_pages = get_theme_mod( 'magine_search_exclude_pages' ); ?>
    <?php if ($magine_search_exclude_pages) { ?>
    <input type="hidden" name="post_type" value="post" />
    <?php } ?>
        <div class="input-group-append"> 
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>