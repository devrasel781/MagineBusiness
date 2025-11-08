<?php get_header('404'); ?>
<?php
$magine_title = get_theme_mod('magine_error_title', '404');
$magine_subtitle = get_theme_mod('magine_error_subtitle', 'The page you were looking for could not be found!');
$magine_button_txt = get_theme_mod('magine_error_button_txt', 'Back to Home');
$magine_button_link = get_theme_mod('magine_error_button_link');
$magine_btn_style = get_theme_mod('magine_error_btn_style', 'primary');
if (empty($magine_button_link)) {
    $magine_button_link = home_url( '/' );
}
?>
<main id="magine-404-wrapper">
    <div id="magine-404-container">
        <h1><?php echo esc_html($magine_title); ?></h1>
        <p class="magine-404-subtitle"><?php echo esc_html($magine_subtitle); ?></p>
        <a href="<?php echo esc_url($magine_button_link); ?>" class="btn btn-<?php echo esc_attr($magine_btn_style); ?>"><?php echo esc_html($magine_button_txt); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
    </div>
</main>
<?php get_footer('404'); ?>