<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>   
<body <?php body_class(); ?>>
<?php
wp_body_open();
$magine_header_style = get_theme_mod('magine_header_style', 'header');
$magine_cmb2_header_style = get_post_meta( get_the_id(), 'magine_cmb2_header_style', true );
if ((!empty($magine_cmb2_header_style)) && ($magine_cmb2_header_style != 'default')) { 
    get_template_part( 'templates/header/' . $magine_cmb2_header_style, 'template');
} else {
    get_template_part( 'templates/header/' . $magine_header_style, 'template');
}   
?>    