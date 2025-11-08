<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>" class="magine-lg-form">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="<?php esc_attr_e('Enter a keyword...', 'magine'); ?>" name="s" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            <?php if (( class_exists( 'woocommerce' ) ) && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) { ?>
            <input type="hidden" name="post_type" value="product" />
            <?php } else { ?>
            <?php $magine_search_exclude_pages = get_theme_mod( 'magine_search_exclude_pages' ); ?>
            <?php if ($magine_search_exclude_pages) { ?>
            <input type="hidden" name="post_type" value="post" />
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</form>
