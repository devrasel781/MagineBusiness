<?php
if ( !defined('ABSPATH')) exit;

if ( ! function_exists( 'magine_theme_setup' ) ) {
    function magine_theme_setup() {
        
        // Set the default content width.
        $GLOBALS['content_width'] = 1520;
        
        /* Translations */
        load_theme_textdomain( 'magine', get_template_directory() .'/languages' );
        $magine_locale = get_locale();
        $magine_locale_file = get_template_directory() . '/languages/$magine_locale.php';
        if ( is_readable($magine_locale_file) ) {
	       require_once($magine_locale_file);
        }
        
        /* Add theme support */
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'quote'));
        add_theme_support( 'responsive-embeds' );
        
        $custom_bg = array(
            'default-color'          => 'ffffff',
            'default-repeat'         => 'no-repeat',
            'default-position-x'     => 'center',
                'default-position-y'     => 'center',
                'default-size'           => 'cover',
            'default-attachment'     => 'scroll'
        );
        add_theme_support( 'custom-background' );
        
        /* Woocommerce */
        add_theme_support( 'woocommerce', array(
            'gallery_thumbnail_image_width' => 200
        ) );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        
        /* Custom Image Sizes */
        add_image_size( 'magine-hero', 1400, 600, true);
        add_image_size( 'magine-thumbnail', 900, 600, true);
        add_image_size( 'magine-vertical-thumbnail', 600, 800, true);
        
        /* Logo */
        $magine_logo = array(
            'height'      => 100,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true
        );
        
        /* Register Menus */
        register_nav_menus(
            array(
                'magine-main-menu' => esc_html__( 'Main Menu', 'magine' )
            )
        );
        
    }
}
add_action( 'after_setup_theme', 'magine_theme_setup' );

/*---------------------------------------------------
Change logo link class
----------------------------------------------------*/

if ( ! function_exists( 'magine_change_logo_class' ) ) {
    function magine_change_logo_class( $html ) {
        $html = str_replace( 'custom-logo-link', 'magine-logo-link', $html );
        $html = str_replace( 'custom-logo', 'magine-logo', $html );
        return $html;
    }
}

add_filter( 'get_custom_logo', 'magine_change_logo_class' );

/*---------------------------------------------------
Add a body class
----------------------------------------------------*/

if ( ! function_exists( 'magine_body_classes' ) ) {
function magine_body_classes( $classes ) {
    $magine_fixed_header = get_theme_mod('magine_fixed_header');
    $classes[] = 'magine'; 
    if ($magine_fixed_header) {
        $classes[] = 'fixed-header'; 
    }
    return $classes;    
}
}
add_filter( 'body_class','magine_body_classes' );

/*---------------------------------------------------
Add a pingback url auto-discovery header for single posts, pages, or attachments.
----------------------------------------------------*/

function magine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magine_pingback_header' );

/*---------------------------------------------------
Custom Thumbnail Sizes
----------------------------------------------------*/

if ( ! function_exists( 'magine_image_sizes' ) ) {
    function magine_image_sizes($maginesizes) {
        $magineaddsizes = array(
            'magine-hero' => esc_html__( 'Magine Hero Image', 'magine'),
            'magine-thumbnail' => esc_html__( 'Magine Thumbnail', 'magine'),
            'magine-vertical-thumbnail' => esc_html__( 'Magine Vertical Thumbnail', 'magine')
        );
        $maginenewsizes = array_merge($maginesizes, $magineaddsizes);
        return $maginenewsizes;
    }
}
add_filter('image_size_names_choose', 'magine_image_sizes');

/*---------------------------------------------------
Wrap category widget post count in a span
----------------------------------------------------*/

if ( ! function_exists( 'magine_cat_count_span' ) ) {
function magine_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="badge badge-dark">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}
}
add_filter('wp_list_categories', 'magine_cat_count_span');

/*---------------------------------------------------
Archive title filter
----------------------------------------------------*/

if ( ! function_exists( 'magine_archive_title' ) ) {
    function magine_archive_title($title) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = get_the_author();
        }
        return $title;
    }
}

add_filter('get_the_archive_title', 'magine_archive_title');

/*---------------------------------------------------
Add class to next/previous post links
----------------------------------------------------*/

if ( ! function_exists( 'magine_posts_link_attributes' ) ) {
    function magine_posts_link_attributes($output) {
        $class = 'class="magine-post-nav"';
        return str_replace('<a href=', '<a '.$class.' href=', $output);
    }
}

add_filter('next_post_link', 'magine_posts_link_attributes');
add_filter('previous_post_link', 'magine_posts_link_attributes');

/*---------------------------------------------------
Stylesheets
----------------------------------------------------*/

if ( ! function_exists( 'magine_theme_styles' ) ) {
function magine_theme_styles()  
{   
    $magine_disable_external_script = get_theme_mod('magine_disable_external_script');
    
    // Default Font
    if (!$magine_disable_external_script) {
        wp_enqueue_style('magine-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800&display=swap&subset=latin-ext', false, '');
    }
    
    // Plugins
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css', false, '5.1');
    
    // Bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.1.3');
    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', get_template_directory_uri() . '/css/bootstrap-rtl.css', array( 'bootstrap' ), '4.1.3');
    }
    
    // Main Styles
    wp_enqueue_style('magine-style', get_stylesheet_uri());
    
    // Theme Settings  
    $magine_default_font_size = get_theme_mod('magine_default_font_size', 16);
    $magine_fixed_header = get_theme_mod('magine_fixed_header');
    $magine_fixed_header = get_theme_mod('magine_header_bg_color', '#0073aa');
    $magine_header_overlay_color = get_theme_mod('magine_header_overlay_color', 'rgba(255,255,255,0)');
    $magine_header_overlay_color_2 = get_theme_mod('magine_header_overlay_color_2', 'rgba(255,255,255,0)');
    
    $magine_inline_style = '';
    
    if ( is_admin_bar_showing() ) {
        $magine_inline_style .= '#magine-404-wrapper {height: calc(100vh - 32px)}@media screen and (max-width: 782px){#magine-404-wrapper {height: calc(100vh - 46px)}}';
    }
    
    if ((!empty($magine_default_font_size) && ($magine_default_font_size != 16))) {
        $magine_inline_style .= 'html { font-size:' . $magine_default_font_size . 'px }@media only screen and (max-width: 991px) { html {font-size:' . ($magine_default_font_size - 1) . 'px}}@media only screen and (max-width: 575px) { html {font-size:' . ($magine_default_font_size - 2) . 'px} }';
    }
    
    $magine_inline_style .= '#magine-header-overlay {background: linear-gradient(90deg, ' . $magine_header_overlay_color . ' 0, ' . $magine_header_overlay_color_2 . ' 100%);}';
    
    wp_add_inline_style( 'magine-style', $magine_inline_style );
}
}
add_action('wp_enqueue_scripts', 'magine_theme_styles');

/*---------------------------------------------------
javascript files
----------------------------------------------------*/

if ( ! function_exists( 'magine_script_register' ) ) {
function magine_script_register() {
    $magine_sticky_menu = get_theme_mod('magine_sticky_menu');
    
    // Bootstrap
    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '4.1.0', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '4.1.0', true );
    
    // Responsive Masonry Grid
    wp_enqueue_script('egemenerd-grid', get_template_directory_uri() . '/js/egemenerd-grid.js', array( 'jquery' ), '1.0.0', true );
    
    // Off-Canvas Panel
    if (!is_rtl()) {
        wp_enqueue_script('magine-panel', get_template_directory_uri() . '/js/panel.js', array( 'jquery' ), '1.0.0', true );
    } else {
        wp_enqueue_script('magine-panel-rtl', get_template_directory_uri() . '/js/panel-rtl.js', array( 'jquery' ), '1.0.0', true );
    }
    
    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    // Custom
    wp_enqueue_script('magine-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
    
    $magine_language = 'default';
    if (is_rtl()) {
        $magine_language = 'rtl';
    }
    if ($magine_sticky_menu) {
       $magine_sticky_menu = 'enabled'; 
    } else {
        $magine_sticky_menu = 'disabled'; 
    }
    
    $magine_script_param = array(
        'magine_language' => $magine_language,
        'magine_sticky_menu' => $magine_sticky_menu
    );
    wp_localize_script('magine-custom', 'magine_script_vars', $magine_script_param);
}
}
add_action( 'wp_enqueue_scripts', 'magine_script_register' );

/*---------------------------------------------------
Dashboard scripts
----------------------------------------------------*/

if ( ! function_exists( 'magine_theme_admin_scripts' ) ) {
function magine_theme_admin_scripts(){
    wp_enqueue_style('magine-theme-admin-style', get_template_directory_uri() . '/includes/css/admin.css', false, '1.0');
}
}
add_action( 'admin_enqueue_scripts', 'magine_theme_admin_scripts', 99 );

/*---------------------------------------------------
Register Sidebars
----------------------------------------------------*/

if ( ! function_exists( 'magine_sidebars_widgets_init' ) ) {
function magine_sidebars_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'magine'),
        'id' => 'magine_main_sidebar',
        'description' => esc_html__( 'This sidebar will be displayed on blog pages.', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="title-with-border"><span>',
        'after_title' => '</span></h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Slide-in Sidebar', 'magine'),
        'id' => 'magine_slidein_sidebar',
        'description' => esc_html__( 'Sliding Sidebar', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="title-with-border"><span>',
        'after_title' => '</span></h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'WooCommerce Sidebar', 'magine'),
        'id' => 'magine_woo_sidebar',
        'description' => esc_html__( 'This sidebar will be displayed on WooCommerce pages.', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="title-with-border"><span>',
        'after_title' => '</span></h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Footer 1', 'magine'),
        'id' => 'magine_footer_widgets',
        'description' => esc_html__( 'First Column.', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Footer 2', 'magine'),
        'id' => 'magine_footer_2_widgets',
        'description' => esc_html__( 'Second Column.', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Footer 3', 'magine'),
        'id' => 'magine_footer_3_widgets',
        'description' => esc_html__( 'Third Column', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Footer 4', 'magine'),
        'id' => 'magine_footer_4_widgets',
        'description' => esc_html__( 'Fourth Column', 'magine' ),
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar( array(
        'name' => esc_html__( 'bbPress Sidebar', 'magine'),
        'id' => 'magine_bbpress_sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s magine-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="title-with-border"><span>',
        'after_title' => '</span></h5>',
    ));
}
}
add_action( 'widgets_init', 'magine_sidebars_widgets_init' );

/*---------------------------------------------------
Custom excerpt dots
----------------------------------------------------*/

if ( ! function_exists( 'magine_excerpt_read_more' ) ) {
function magine_excerpt_read_more( $more ) {
	return '...';
}
}
add_filter('excerpt_more', 'magine_excerpt_read_more');

/*---------------------------------------------------
Custom tag cloud
----------------------------------------------------*/
if ( ! function_exists( 'magine_wp_generate_tag_cloud' ) ) {
function magine_wp_generate_tag_cloud($content, $tags, $args)
{ 
    if ( ! is_admin() ) {        
        $output = str_replace(array( '(', ')' ), '', $content);
    } else {
        $output = $content;
    }
  return $output;    
}
}
add_filter('wp_generate_tag_cloud','magine_wp_generate_tag_cloud', 10, 3);

if ( ! function_exists( 'magine_tag_cloud_args' ) ) {
    function magine_tag_cloud_args($args) {
        $magine_args = array('smallest' => 0.85, 'largest' => 0.85, 'orderby' => 'count','unit' => 'rem','order' => 'DESC');
        $args = wp_parse_args( $args, $magine_args );
        return $args;
    }
}
add_filter('widget_tag_cloud_args','magine_tag_cloud_args');

/*---------------------------------------------------
Custom comments
----------------------------------------------------*/
if ( ! function_exists( 'magine_comment' ) ) {
function magine_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">      
    <div id="comment-<?php comment_ID(); ?>" class="magine_comments"> 
        <?php if ($comment->comment_approved == '0') : ?>
        <em><?php echo esc_html('Your comment is awaiting moderation.', 'magine'); ?></em>
        <br />
        <?php endif; ?> 
        <div class="magine_comment">
            <div class="magine_comment_inner">
                <?php $magine_avatar = get_avatar( $comment, 60 ); ?>
                <?php if (!empty($magine_avatar)) { ?>
                <div class="magine_comment_left">
                    <?php echo get_avatar( $comment, 60 ); ?> 
                </div>
                <?php } ?>
                <div class="magine_comment_right">
                    <div class="magine_comment_right_inner <?php if (empty($magine_avatar)) { ?>magine_no_avatar<?php } ?>">
                    <cite class="magine_fn"><?php printf(esc_attr('%s'), get_comment_author_link()) ?></cite>
                    <div class="magine_comment_links">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><i class="far fa-clock"></i> <?php printf(esc_html__('%1$s at %2$s', 'magine'), get_comment_date(),  get_comment_time()) ?></a> - <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link(esc_html__('(Edit)', 'magine'),'  ','') ?>
                    </div>    
                    <div class="magine_comment_text">
                        <?php comment_text(); ?>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}          
}

/*---------------------------------------------------
FontAwesome Array
----------------------------------------------------*/

if ( ! function_exists( 'magine_fontawesome_array' ) ) {
function magine_fontawesome_array() {
	$magine_fa_array = array(
        'facebook-f' => esc_html__( 'Facebook', 'magine' ),
        'twitter' => esc_html__( 'Twitter', 'magine' ),
        'google-plus-g' => esc_html__( 'Google +', 'magine' ),
        'google' => esc_html__( 'Google', 'magine' ),
        'linkedin-in' => esc_html__( 'Linkedin', 'magine' ),
        'instagram' => esc_html__( 'Instagram', 'magine' ),
        'vimeo-v' => esc_html__( 'Vimeo', 'magine' ),
        'youtube' => esc_html__( 'You Tube', 'magine' ),
        'apple' => esc_html__( 'Apple', 'magine' ),
        'android' => esc_html__( 'Android', 'magine' ),
        'dribbble' => esc_html__( 'Dribbble', 'magine' ),
        'flickr' => esc_html__( 'Flickr', 'magine' ),
        'pinterest' => esc_html__( 'Pinterest', 'magine' ),
        'vk' => esc_html__( 'VK', 'magine' ),
        'codepen' => esc_html__( 'Codepen', 'magine' ),
        'snapchat-ghost' => esc_html__( 'Snapchat', 'magine' ),
        'delicious' => esc_html__( 'Delicious', 'magine' ),
        'github' => esc_html__( 'Github', 'magine' ),
        'reddit-alien' => esc_html__( 'Reddit', 'magine' ),
        'tumblr' => esc_html__( 'Tumblr', 'magine' ),     
        'twitch' => esc_html__( 'Twitch', 'magine' ),
        'tripadvisor' => esc_html__( 'Trip Advisor', 'magine' ),
        'vine' => esc_html__( 'Vine', 'magine' ),
        'foursquare' => esc_html__( 'Foursquare', 'magine' ),
        'lastfm' => esc_html__( 'Lastfm', 'magine' ),
        'soundcloud' => esc_html__( 'Soundcloud', 'magine' ),
        'deviantart' => esc_html__( 'Deviantart', 'magine' ),
        'odnoklassniki' => esc_html__( 'Odnoklassniki', 'magine' ),
        'spotify' => esc_html__( 'Spotify', 'magine' ),
        'xing' => esc_html__( 'Xing', 'magine' ),
        'amazon' => esc_html__( 'Amazon', 'magine' ),
        'digg' => esc_html__( 'Digg', 'magine' ),
        'etsy' => esc_html__( 'Etsy', 'magine' ),
        'behance' => esc_html__( 'Behance', 'magine' ),
        'slack' => esc_html__( 'Slack', 'magine' ),
    );
    return $magine_fa_array;
}
}

/* ---------------------------------------------------------
Add a class to Mailchimp form
----------------------------------------------------------- */
add_filter( 'mc4wp_form_css_classes', function( $classes ) { 
	$classes[] = 'magine-mailchimp';
	return $classes;
});

/* ---------------------------------------------------------
TGM Activation Class
----------------------------------------------------------- */

require_once(get_template_directory() . '/includes/class-tgm-plugin-activation.php');

if ( ! function_exists( 'magine_register_required_plugins' ) ) {
function magine_register_required_plugins() {
	$magine_plugins = array(
		array(
			'name'     				=> esc_html__( 'Magine Features', 'magine'),
			'slug'     				=> 'magine-features',
			'source'   				=> get_template_directory_uri() . '/plugins/magine-features.zip',
			'required' 				=> true,
            'version' 				=> '1.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
		),
        array(
			'name'     				=> esc_html__( 'TMC Posts', 'magine'),
			'slug'     				=> 'tmc-posts',
			'source'   				=> get_template_directory_uri() . '/plugins/tmc-posts.zip',
			'required' 				=> true,
            'version' 				=> '1.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
		),
        array(
			'name'     				=> esc_html__( 'Kirki', 'magine'),
			'slug'     				=> 'kirki',
			'required' 				=> true,
		),
        array(
			'name'     				=> esc_html__( 'Elementor', 'magine'),
			'slug'     				=> 'elementor',
			'required' 				=> true,
		),
        array(
			'name'     				=> esc_html__( 'CMB2', 'magine'),
			'slug'     				=> 'cmb2',
			'required' 				=> true,
		),
        array(
			'name'     				=> esc_html__( 'WooCommerce', 'magine'),
			'slug'     				=> 'woocommerce',
			'required' 				=> false,
		),
        array(
            'name'     				=> esc_html__( 'bbPress', 'magine'),
            'slug'     				=> 'bbpress',
            'required' 				=> false,
        ),
        array(
			'name'     				=> esc_html__( 'Lightbox with PhotoSwipe', 'magine'),
			'slug'     				=> 'lightbox-photoswipe',
			'required' 				=> false,
		),
        array(
			'name'     				=> esc_html__( 'Contact Form 7', 'magine'),
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
		),
        array(
			'name'     				=> esc_html__( 'MailChimp for WordPress', 'magine'),
			'slug'     				=> 'mailchimp-for-wp',
			'required' 				=> false,
		),
        array(
			'name'     				=> esc_html__( 'One Click Demo Import', 'magine'),
			'slug'     				=> 'one-click-demo-import',
			'required' 				=> false,
		)
	);

	$magine_config = array(
        'id'           => 'magine',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $magine_plugins, $magine_config );

}
}
add_action( 'tgmpa_register', 'magine_register_required_plugins' );
?>