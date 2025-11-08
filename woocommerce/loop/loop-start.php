<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
$magine_shop_layout = esc_attr(get_theme_mod('magine_shop_layout', 'twocolumns'));
$magine_selected_shop_layout = '';
$magine_small_grid = '';

if ($magine_shop_layout == 'fourcolumns') { 
    $magine_selected_shop_layout = 'magine-four-columns';
} elseif ($magine_shop_layout == 'threecolumns') { 
    $magine_selected_shop_layout = 'magine-three-columns';
} else {
    $magine_selected_shop_layout = 'magine-two-columns';
}

if ((is_cart()) || (is_checkout())) {
    $magine_selected_shop_layout = 'magine-four-columns';
}

if ($magine_selected_shop_layout == 'magine-four-columns') {
    $magine_small_grid = 'small-grid';
}

?>
<div class="clearfix"></div>
<div class="magine-masonry-grid <?php echo esc_html($magine_small_grid); ?>">
<div class="<?php echo esc_attr($magine_selected_shop_layout); ?>" data-columns>