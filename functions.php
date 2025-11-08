<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

require_once ( get_template_directory() . '/includes/functions.php' );

/* BOOTSTRAP 4 */
require_once ( get_template_directory() . '/includes/bs4navwalker.php' );
require_once ( get_template_directory() . '/includes/bs4pagination.php' );
require_once ( get_template_directory() . '/includes/bs4breadcrumb.php' );

/* ELEMENTOR */
require_once ( get_template_directory() . '/includes/elementor.php' );

/* KIRKI */
if (class_exists( 'Kirki' )) {
    require_once ( get_template_directory() . '/includes/kirki.php' );
}

/* IF CMB2 PLUGIN IS LOADED */
if ( defined( 'CMB2_LOADED' ) ) {
    require_once ( get_template_directory() . '/includes/meta-boxes.php' );
}

/* IF WOOCOMMERCE PLUGIN IS LOADED */
if ( class_exists( 'woocommerce' ) ) {
    require_once ( get_template_directory() . '/includes/woo-functions.php' );
}