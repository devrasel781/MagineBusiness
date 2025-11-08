<?php
/*---------------------------------------------------
Remove default layout
----------------------------------------------------*/

if ( ! function_exists( 'magine_woo_dequeue_styles' ) ) {
    function magine_woo_dequeue_styles( $enqueue_styles ) {
        unset( $enqueue_styles['woocommerce-layout'] );
        return $enqueue_styles;
    }
}
add_filter( 'woocommerce_enqueue_styles', 'magine_woo_dequeue_styles' );

/*---------------------------------------------------
Ajax show cart total
----------------------------------------------------*/
if ( ! function_exists( 'magine_cart_count_ajax' ) ) { 
function magine_cart_count_ajax( $fragments ) {    
    $fragments['span.icon-count'] = '<span class="icon-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    return $fragments;   
}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'magine_cart_count_ajax', 10, 1 );

/*---------------------------------------------------
Before shop loop item
----------------------------------------------------*/
function magine_before_shop_loop_item() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
       <div class="magine-out-of-stock"> <?php esc_html_e('Out of Stock', 'magine'); ?> </div>
    <?php
    }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'magine_before_shop_loop_item', 10 );

/*---------------------------------------------------
Add divider before product button
----------------------------------------------------*/
function magine_product_divider_start() { ?>
        </div>
<?php
}
add_action( 'woocommerce_after_shop_loop_item', 'magine_product_divider_start', 4 );

function magine_product_divider_end() { ?>
        <div class="card-footer product-footer">
<?php
}
add_action( 'woocommerce_after_shop_loop_item', 'magine_product_divider_end', 6 );

/*---------------------------------------------------
Change default product thumbnail size
----------------------------------------------------*/

if ( ! function_exists( 'magine_product_thumbnail_size' ) ) {
    function magine_product_thumbnail_size($size) {	
        $size = get_theme_mod('magine_product_thumbnail', 'large');
        return $size;
    }
}

add_filter( 'single_product_archive_thumbnail_size' , 'magine_product_thumbnail_size' );
add_filter( 'subcategory_archive_thumbnail_size' , 'magine_product_thumbnail_size' );

/*---------------------------------------------------
Custom placeholder
----------------------------------------------------*/

if ( ! function_exists( 'magine_custom_woocommerce_placeholder' ) ) {
function magine_custom_woocommerce_placeholder( $image_url ) {
    $magine_woo_placeholder = esc_attr(get_theme_mod('magine_woo_placeholder'));
    if (!empty($magine_woo_placeholder)) {
        $image_url = esc_url($magine_woo_placeholder);
    } else {
        $image_url = get_template_directory_uri() . '/images/woocommerce-placeholder.png';
    }
    return $image_url;
}
}

add_filter( 'woocommerce_placeholder_img_src', 'magine_custom_woocommerce_placeholder', 10 );

/*---------------------------------------------------
Product per page
----------------------------------------------------*/

if ( ! function_exists( 'magine_loop_shop_per_page' ) ) {
    function magine_loop_shop_per_page( $cols ) {
        $cols = esc_attr(get_theme_mod('magine_shop_at_most', 8));
        return $cols;
    }
}

add_filter( 'loop_shop_per_page', 'magine_loop_shop_per_page', 20 );

/*---------------------------------------------------
Remove Related Products (Theme Settings)
----------------------------------------------------*/

$magine_remove_related = esc_attr(get_theme_mod('magine_remove_related', 1));

if ($magine_remove_related == 0) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

/*---------------------------------------------------
Remove page titles and taxonomy description
----------------------------------------------------*/

if ( ! function_exists( 'magine_woo_hide_page_title' ) ) {
    function magine_woo_hide_page_title() {	
        return false;	
    }
}

add_filter( 'woocommerce_show_page_title' , 'magine_woo_hide_page_title' );
remove_action( 'woocommerce_archive_description' , 'woocommerce_taxonomy_archive_description', 10 );

/*---------------------------------------------------
Pagination arrows
----------------------------------------------------*/

add_filter( 'woocommerce_pagination_args', 	'magine_woo_pagination' );
function magine_woo_pagination( $args ) {
	$args['prev_text'] = '<i class="fas fa-chevron-left"></i>';
	$args['next_text'] = '<i class="fas fa-chevron-right"></i>';
	return $args;
}

/*---------------------------------------------------
Custom styles
----------------------------------------------------*/

if ( ! function_exists( 'magine_woo_print_styles' ) ) {
    function magine_woo_print_styles()
    {        
        wp_enqueue_style('magine-woo', get_template_directory_uri() . '/css/woocommerce.css', false, '1.0');
        
        if (is_rtl()) {
            wp_enqueue_style('magine-woo-rtl', get_template_directory_uri() . '/css/woocommerce-rtl.css', false, '1.0');
        }
        
        $magine_product_img_size = get_theme_mod('magine_product_img_size', 50);
        
        $magine_woo_inline_style = '';
        
        if ($magine_product_img_size != 50) {
            $magine_woo_inline_style .= '.magine-single-product-left {width: ' . $magine_product_img_size . '%;}.magine-single-product-right {width: ' . (100 - $magine_product_img_size) . '%;}';   
        }
        wp_add_inline_style( 'magine-woo', $magine_woo_inline_style );
    }
}
add_action('wp_enqueue_scripts', 'magine_woo_print_styles', 99);
?>