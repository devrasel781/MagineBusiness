<?php
/* ---------------------------------------------------------
Config
----------------------------------------------------------- */

$kirki_prefix = 'magine_';

Kirki::add_config( $kirki_prefix . 'theme_config_id', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod'
));

/* ---------------------------------------------------------
Panel & Sections
----------------------------------------------------------- */

Kirki::add_panel( $kirki_prefix . 'theme_settings', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Theme Settings', 'magine' )
));

Kirki::add_section( $kirki_prefix . 'general', array(
    'title'     => esc_html__( 'General', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 1
));

Kirki::add_section( $kirki_prefix . 'logo', array(
    'title'     => esc_html__( 'Header', 'magine'),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 2
));

Kirki::add_section( $kirki_prefix . 'header', array(
    'title'     => esc_html__( 'Page Title', 'magine'),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 3
));

Kirki::add_section( $kirki_prefix . 'blog', array(
    'title'     => esc_html__( 'Blog', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 4
));

Kirki::add_section( $kirki_prefix . 'post', array(
    'title'     => esc_html__( 'Single Post', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 5
));

Kirki::add_section( $kirki_prefix . 'search', array(
    'title'     => esc_html__( 'Search', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 6
));

Kirki::add_section( $kirki_prefix . 'author', array(
    'title'     => esc_html__( 'Author', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 7
));

Kirki::add_section( $kirki_prefix . 'error', array(
    'title'     => esc_html__( '404 Page', 'magine' ),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 8
));

Kirki::add_section( $kirki_prefix . 'woocommerce', array(
    'title'     => esc_html__( 'WooCommerce', 'magine'),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 9,
));

Kirki::add_section( $kirki_prefix . 'footer', array(
    'title'     => esc_html__( 'Footer', 'magine'),
    'panel'     => $kirki_prefix . 'theme_settings',
    'priority'  => 10
));

/* ---------------------------------------------------------
Fields
----------------------------------------------------------- */

/* Site Identity */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'image',
	'settings'    => $kirki_prefix . 'logo',
	'label'       => esc_html__( 'Logo', 'magine'),
	'section'     => 'title_tagline',
	'default'     => '',
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'logo_width',
	'label'       => esc_html__( 'Logo Width', 'magine'),
	'section'     => 'title_tagline',
	'default'     => 220,
	'choices'     => array(
		'min'  => 40,
		'max'  => 500,
		'step' => 1,
	),
    'output' => array(
        array(
            'element'  => '.magine-logo',
            'property' => 'width',
            'units' => 'px',
            'exclude' => array('220')
        )
    )
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'logo_width_mobile',
	'label'       => esc_html__( 'Logo Width (Mobile)', 'magine'),
	'section'     => 'title_tagline',
	'default'     => 180,
	'choices'     => array(
		'min'  => 40,
		'max'  => 500,
		'step' => 1,
	),
    'output' => array(
        array(
            'element'  => '.magine-logo',
            'property' => 'width',
            'media_query' => '@media screen and (max-width: 991px)',
            'units' => 'px',
            'exclude' => array('180')
        )
    )
));


/* General */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Primary Color', 'magine' ),
	'settings'    => $kirki_prefix . 'primary_color',
	'section'     => $kirki_prefix . 'general',
	'default'     => '#0073aa',
    'output' => array(
		array(
			'element' => 'a,.magine-footer-icons li a:hover,[class*="elementor-widget-wp-widget-"] a:hover,.magine-widget a:not(.btn):hover,.tagcloud a:hover,a[class^="tag"]:hover,body.magine .magine-page-links > a > span:hover,.elementor-widget-heading .elementor-heading-title > a:hover,body.magine .card-title a:hover,.magine-post-nav:hover,.magine-author-meta h3 a:hover',
            'property' => 'color',
            'exclude' => array('#0073aa')
		),
        array(
			'element' => '#magine-footer-bottom #magine-gototop,body.magine .magine-page-links > span,.woocommerce-MyAccount-navigation ul,body.magine.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.elementor-widget-wp-widget-categories ul li:hover span.badge,.widget_categories ul li:hover span.badge,.magine-top-icons.magine-author-box-icons .magine-top-woo-icon a',
            'property' => 'background',
            'exclude' => array('#0073aa')
		),
        array(
			'element' => '.btn-primary,.btn-primary:hover,.btn-primary:focus,.page-item.active .page-link,.page-item.active .page-link:hover,.badge-primary,.alert-primary,input[type="submit"]:not(.btn):not(.slick-arrow),input[type="button"]:not(.btn):not(.slick-arrow):not(.ed_button),.button,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce a.added_to_cart,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,body.magine .magine-carousel .slick-prev,body.magine .magine-carousel .slick-next,.page-link:focus,.page-link:hover',
            'property' => 'background-color',
            'exclude' => array('#0073aa')
		),
        array(
			'element' => '.btn-primary,.btn-primary:hover,.btn-primary:focus,.page-item.active .page-link,.page-item.active .page-link:hover,.alert-primary',
            'property' => 'border-color',
            'exclude' => array('#0073aa')
		)
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'disable_external_script',
	'label'       => esc_html__( 'Stop Using Google CDN', 'magine'),
    'description' => esc_html__( 'The default fonts of the theme is loaded via Google CDN.', 'magine'),
	'section'     => $kirki_prefix . 'general',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'default_font_size',
	'label'       => esc_html__( 'Default Browser Font Size (px)', 'magine'),
    'description' => esc_html__( 'All font-sizes in the theme will scaled according to this value.', 'magine'),
	'section'     => $kirki_prefix . 'general',
	'default'     => 16,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'body_fonts',
	'label'       => esc_html__( 'Body', 'magine' ),
	'section'     => $kirki_prefix . 'general',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
        'subsets'        => array( 'latin-ext' ),
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'color'          => '#344055'
	),
	'output' => array(
		array(
			'element' => 'body, p',
		)
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'heading_fonts',
	'label'       => esc_html__( 'Headings', 'magine' ),
	'section'     => $kirki_prefix . 'general',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '700',
        'subsets'        => array( 'latin-ext' ),
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#202c39'
	),
	'output' => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,.card-title,.card-title a',
		)
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'panel_width',
	'label'       => esc_html__( 'Sliding Panel Width', 'magine'),
    'description' => esc_html__( 'Maximum Sliding Panel width in pixels.', 'magine'),
	'section'     => $kirki_prefix . 'general',
	'default'     => 480,
    'choices'     => array(
		'min'  => 200,
		'max'  => 1200,
		'step' => 1,
	),
));

/* Header */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'header_style',
	'label'       => esc_html__( 'Header Layout', 'magine'),
	'section'     => $kirki_prefix . 'logo',
	'default'     => 'header',
    'choices'     => array(
        'header' => esc_html__( 'Layout 1', 'magine' ),
        'header2' => esc_html__( 'Layout 2', 'magine' ),
        'header3' => esc_html__( 'Layout 3', 'magine' ),
        'header4' => esc_html__( 'Layout 4', 'magine' )
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'topbar_bg_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#0073aa',
    'output' => array(
		array(
			'element' => '#magine-header',
            'property' => 'background-color',
            'exclude' => array('#0073aa')
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Icon Color', 'magine' ),
	'settings'    => $kirki_prefix . 'header_icon_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => 'rgba(255,255,255,0.9)',
    'output' => array(
		array(
			'element' => '.magine-top-woo-icon a',
            'property' => 'color',
            'exclude' => array('rgba(255,255,255,0.9)'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Icon Hover Color', 'magine' ),
	'settings'    => $kirki_prefix . 'header_icon_hover_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#ffffff',
    'output' => array(
		array(
			'element' => '.magine-top-woo-icon a:hover',
            'property' => 'color',
            'exclude' => array('#ffffff'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Icon Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'header_icon_bg_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#005177',
    'output' => array(
		array(
			'element' => '.magine-top-woo-icon a',
            'property' => 'background-color',
            'exclude' => array('#005177'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'custom',
	'settings'    => $kirki_prefix . 'title_main_menu',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '<h2>' . esc_html__( 'Menu', 'magine' ) . '</h2>'
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'sticky_menu',
	'label'       => esc_html__( 'Sticky Menu', 'magine'),
	'section'     => $kirki_prefix . 'logo',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'menu_bg_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#0073aa',
    'output' => array(
		array(
			'element' => '#magine-header-menu',
            'property' => 'background-color',
            'exclude' => array('#0073aa')
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Link Color', 'magine' ),
	'settings'    => $kirki_prefix . 'menu_link_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => 'rgba(255,255,255,0.9)',
    'output' => array(
		array(
			'element' => '#magine-header-menu .navbar-nav .nav-link,#navbar-toggler',
            'property' => 'color',
            'exclude' => array('rgba(255,255,255,0.9)'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Link Hover Color', 'magine' ),
	'settings'    => $kirki_prefix . 'menu_link_hover_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#ffffff',
    'output' => array(
		array(
			'element' => '#magine-header-menu .navbar-nav .nav-link:hover',
            'property' => 'color',
            'exclude' => array('#ffffff'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Dropdown Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'dropdown_bg_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#005177',
    'output' => array(
		array(
			'element' => '#magine-header-menu .dropdown-menu',
            'property' => 'background-color',
            'exclude' => array('#005177')
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Dropdown Link Color', 'magine' ),
	'settings'    => $kirki_prefix . 'dropdown_link_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => 'rgba(255,255,255,0.7)',
    'output' => array(
		array(
			'element' => '#magine-header-menu .dropdown-item',
            'property' => 'color',
            'exclude' => array('rgba(255,255,255,0.7)'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Dropdown Link Hover Color', 'magine' ),
	'settings'    => $kirki_prefix . 'dropdown_link_hover_color',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '#ffffff',
    'output' => array(
		array(
			'element' => '#magine-header-menu .dropdown-item:hover',
            'property' => 'color',
            'exclude' => array('#ffffff'),
            'choices'     => array(
                'alpha' => true,
            ),
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'custom',
	'settings'    => $kirki_prefix . 'title_social',
	'section'     => $kirki_prefix . 'logo',
	'default'     => '<h2>' . esc_html__( 'Social Icons', 'magine' ) . '</h2>'
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
		'type'        => 'repeater',
		'settings'    => $kirki_prefix . 'footer_icons',
		'label'       => esc_html__( 'Icons', 'magine' ),
		'description' => esc_html__( 'Each row is a new icon.', 'magine' ),
		'section'     => $kirki_prefix . 'logo',
		'fields'      => array(
            'icon'   => array(
				'type'        => 'select',
				'label'       => esc_html__( 'FontAwesome Icon', 'magine' ),
                'choices'     => magine_fontawesome_array(),
                'default'     => 'twitter'
			),
            'desc'    => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Description', 'magine' ),
				'description' => '',
				'default'     => ''
			),
			'destination_url'    => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Destination URL', 'magine' ),
				'description' => '',
				'default'     => ''
			),
            'link_target' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Link Target', 'magine' ),
				'description' => esc_html__( 'This will be the link target', 'magine' ),
				'default'     => '_self',
				'choices'     => array(
					'_blank' => esc_html__( 'New Window', 'magine' ),
					'_self'  => esc_html__( 'Same Frame', 'magine' )
				),
			),
		),
));


/* Page Title */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'image',
	'settings'    => $kirki_prefix . 'default_header_img',
	'label'       => esc_html__( 'Background Image', 'magine'),
	'section'     => $kirki_prefix . 'header',
	'default'     => '',
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'header_bg_color',
	'section'     => $kirki_prefix . 'header',
	'default'     => '#0073aa',
    'output' => array(
		array(
			'element' => '#magine-page-title',
            'property' => 'background-color',
            'exclude' => array('#0073aa')
		),
	)
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Overlay Background Color 1', 'magine' ),
	'settings'    => $kirki_prefix . 'header_overlay_color',
	'section'     => $kirki_prefix . 'header',
	'default'     => 'rgba(255,255,255,0)',
    'choices'     => [
		'alpha' => true,
	]
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Overlay Background Color 2', 'magine' ),
	'settings'    => $kirki_prefix . 'header_overlay_color_2',
	'section'     => $kirki_prefix . 'header',
	'default'     => 'rgba(255,255,255,0)',
    'choices'     => [
		'alpha' => true,
	]
) );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'header_title',
	'label'       => esc_html__( 'Title', 'magine' ),
	'section'     => $kirki_prefix . 'header',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '800',
        'subsets'        => array( 'latin-ext' ),
        'font-size'      => '2.3rem',
		'line-height'    => '1.4',
		'letter-spacing' => '0',
		'color'          => '#ffffff'
	),
	'output' => array(
		array(
			'element' => '#magine-page-title h1',
		)
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'header_subtitle',
	'label'       => esc_html__( 'Sub Title', 'magine' ),
	'section'     => $kirki_prefix . 'header',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
        'subsets'        => array( 'latin-ext' ),
        'font-size'      => '1.2rem',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'color'          => '#ffffff'
	),
	'output' => array(
		array(
			'element' => '#magine-page-title .magine-page-subtitle, #magine-page-title .magine-page-subtitle p,body.magine .breadcrumb,.woocommerce .woocommerce-breadcrumb a,.woocommerce .woocommerce-breadcrumb a:hover',
		)
	)
));

/* Blog */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'blog_layout',
	'label'       => esc_html__( 'Default blog layout', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 'magine-two-columns',
    'choices'     => array(
        'magine-one-column' => esc_html__( 'One Column', 'magine'),
		'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
		'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
        'magine-four-columns' => esc_html__( 'Four Column', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'post_layout',
	'label'       => esc_html__( 'Card style', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 'masonry',
    'choices'     => array(
        'masonry' => esc_html__( 'Vertical', 'magine'),
        'xsmasonry' => esc_html__( 'Vertical (Small)', 'magine'),
		'post' => esc_html__( 'Horizontal', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'masonry_spacing',
	'label'       => esc_html__( 'Masonry Spacing', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 'medium-grid',
    'choices'     => array(
        'large-grid' => esc_html__( 'Wide', 'magine'),
        'medium-grid' => esc_html__( 'Default', 'magine'),
		'small-grid' => esc_html__( 'Narrow', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'hide_sidebar',
	'label'       => esc_html__( 'Hide Sidebar', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'masonry_thumbnail',
	'label'       => esc_html__( 'Masonry Thumbnail Size', 'magine'),
    'description' => esc_html__( 'Default Thumbnail Size for Masonry Layout', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 'large',
    'choices'     => array(
        'magine-thumbnail' => esc_html__( '900x600 px', 'magine' ),
        'full' => esc_html__( 'Full', 'magine' ),
        'large' => esc_html__( 'Large', 'magine' ),
        'medium' => esc_html__( 'Medium', 'magine' )
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'blog_subtitle',
	'label'       => esc_html__( 'Blog Subtitle', 'magine'),
    'description' => '',
	'section'     => $kirki_prefix . 'blog',
    'default'     => ''
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . '1_column_at_most',
	'label'       => esc_html__( 'Blog - 1 Column Template', 'magine'),
    'description' => esc_html__( 'Maximum number of the posts.', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 8,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . '2_column_at_most',
	'label'       => esc_html__( 'Blog - 2 Column Templates', 'magine'),
    'description' => esc_html__( 'Maximum number of the posts.', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 8,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . '3_column_at_most',
	'label'       => esc_html__( 'Blog - 3 Column Templates', 'magine'),
    'description' => esc_html__( 'Maximum number of the posts.', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 9,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . '4_column_at_most',
	'label'       => esc_html__( 'Blog - 4 Column Templates', 'magine'),
    'description' => esc_html__( 'Maximum number of the posts.', 'magine'),
	'section'     => $kirki_prefix . 'blog',
	'default'     => 12,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	)
));

/* Single Post */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'remove_featured_img',
	'label'       => esc_html__( 'Use featured images for only post thumbnails', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'enable_post_nav',
	'label'       => esc_html__( 'Enable next/previous post navigation', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'enable_related',
	'label'       => esc_html__( 'Enable related posts', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'related_title',
	'label'       => esc_html__( 'Related posts title', 'magine'),
    'description' => '',
	'section'     => $kirki_prefix . 'post',
    'default'     => esc_html__('You May Also Like', 'magine')
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'blog_related_at_most',
	'label'       => esc_html__( 'Maximum number of the related posts', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 6,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'related_by',
    'label'       => esc_html__( 'Display related posts by', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 'category',
	'choices'     => array(
		'category'   => esc_attr__( 'Categories', 'magine' ),
		'post_tag' => esc_attr__( 'Tags', 'magine' )
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'related_layout',
	'label'       => esc_html__( 'Related posts layout', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 'magine-three-columns',
    'choices'     => array(
        'magine-one-column' => esc_html__( 'One Column', 'magine'),
		'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
		'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
        'magine-four-columns' => esc_html__( 'Four Column', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'enable_sharing',
	'label'       => esc_html__( 'Social Media Sharing Buttons', 'magine'),
	'section'     => $kirki_prefix . 'post',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'     => 'multicheck',
		'settings' => $kirki_prefix . 'selected_share',
		'label'    => esc_html__( 'Available Social Media Buttons', 'magine'),
		'section'  => $kirki_prefix . 'post',
		'default'  => array( 'email','facebook', 'twitter', 'linkedin', 'tumblr', 'reddit', 'pinterest' ),
		'choices'  => array(
            'email' => esc_html__( 'Email', 'magine' ),
			'facebook' => esc_html__( 'Facebook', 'magine' ),
			'twitter' => esc_html__( 'Twitter', 'magine' ),
            'linkedin' => esc_html__( 'Linkedin', 'magine' ),
			'tumblr' => esc_html__( 'Tumblr', 'magine' ),
            'reddit' => esc_html__( 'Reddit', 'magine' ),
            'vk' => esc_html__( 'VK', 'magine' ),
            'pinterest' => esc_html__( 'Pinterest', 'magine' ),
            'pocket' => esc_html__( 'Pocket', 'magine' ),
            'hackernews' => esc_html__( 'Hackernews', 'magine' ),
            'xing' => esc_html__( 'Xing', 'magine' ),
		),
));

/* Search */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'fullscreen_search',
	'label'       => esc_html__( 'Enable FullScreen Search', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'search_exclude_pages',
	'label'       => esc_html__( 'Exclude pages from blog search results', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'search_layout',
	'label'       => esc_html__( 'Page layout', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 'magine-two-columns',
    'choices'     => array(
        'magine-one-column' => esc_html__( 'One Column', 'magine'),
		'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
		'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
        'magine-four-columns' => esc_html__( 'Four Column', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'search_post_layout',
	'label'       => esc_html__( 'Card style', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 'masonry',
    'choices'     => array(
        'masonry' => esc_html__( 'Vertical', 'magine'),
        'xsmasonry' => esc_html__( 'Vertical (Small)', 'magine'),
		'post' => esc_html__( 'Horizontal', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'search_masonry_spacing',
	'label'       => esc_html__( 'Masonry Spacing', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 'medium-grid',
    'choices'     => array(
        'large-grid' => esc_html__( 'Wide', 'magine'),
        'medium-grid' => esc_html__( 'Default', 'magine'),
		'small-grid' => esc_html__( 'Narrow', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'search_hide_sidebar',
	'label'       => esc_html__( 'Hide Sidebar', 'magine'),
	'section'     => $kirki_prefix . 'search',
	'default'     => 0
));

/* Author */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'author_layout',
	'label'       => esc_html__( 'Page layout', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 'magine-two-columns',
    'choices'     => array(
        'magine-one-column' => esc_html__( 'One Column', 'magine'),
		'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
		'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
        'magine-four-columns' => esc_html__( 'Four Column', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'author_post_layout',
	'label'       => esc_html__( 'Card style', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 'masonry',
    'choices'     => array(
        'masonry' => esc_html__( 'Vertical', 'magine'),
        'xsmasonry' => esc_html__( 'Vertical (Small)', 'magine'),
		'post' => esc_html__( 'Horizontal', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'radio',
	'settings'    => $kirki_prefix . 'author_masonry_spacing',
	'label'       => esc_html__( 'Masonry Spacing', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 'medium-grid',
    'choices'     => array(
        'large-grid' => esc_html__( 'Wide', 'magine'),
        'medium-grid' => esc_html__( 'Default', 'magine'),
		'small-grid' => esc_html__( 'Narrow', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'author_hide_sidebar',
	'label'       => esc_html__( 'Hide Sidebar', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'custom',
	'settings'    => $kirki_prefix . 'title_author_box',
	'section'     => $kirki_prefix . 'author',
	'default'     => '<h2>' . esc_html__( 'Author Box', 'magine' ) . '</h2>'
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'enable_author_box',
	'label'       => esc_html__( 'Enable Author Box', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'authors_posts_at_most',
	'label'       => esc_html__( 'Maximum number of the posts', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 6,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'authors_posts_layout',
	'label'       => esc_html__( 'Post Layout', 'magine'),
	'section'     => $kirki_prefix . 'author',
	'default'     => 'magine-three-columns',
    'choices'     => array(
        'magine-one-column' => esc_html__( 'One Column', 'magine'),
		'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
		'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
        'magine-four-columns' => esc_html__( 'Four Column', 'magine')
	),
));

/* 404 Page */

Kirki::add_field( 'theme_config_id', [
	'type'        => 'background',
	'settings'    => $kirki_prefix . 'error_page_bg',
	'label'       => esc_html__( 'Background', 'magine' ),
	'section'     => $kirki_prefix . 'error',
	'default'     => [
		'background-color'      => '#fafafa',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#magine-404-wrapper',
		],
	],
] );

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'error_title',
	'label'       => esc_html__( 'Title', 'magine'),
    'description' => '',
	'section'     => $kirki_prefix . 'error',
    'default'     => esc_html__( '404', 'magine' )
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'error_title_typography',
	'label'       => esc_html__( 'Title Typography', 'magine' ),
	'section'     => $kirki_prefix . 'error',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '800',
        'subsets'        => array( 'latin-ext' ),
        'font-size'      => '8rem',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'color'          => '#202c39'
	),
	'output' => array(
		array(
			'element' => '#magine-404-container h1',
		)
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'error_subtitle',
	'label'       => esc_html__( 'Subtitle', 'magine'),
    'description' => '',
	'section'     => $kirki_prefix . 'error',
    'default'     => esc_html__( 'The page you were looking for could not be found!', 'magine' )
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'typography',
	'settings'    => $kirki_prefix . 'error_subtitle_typography',
	'label'       => esc_html__( 'Subtitle Typography', 'magine' ),
	'section'     => $kirki_prefix . 'error',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '700',
        'subsets'        => array( 'latin-ext' ),
        'font-size'      => '1.2rem',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#344055'
	),
	'output' => array(
		array(
			'element' => '#magine-404-container p.magine-404-subtitle',
		)
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'error_button_txt',
	'label'       => esc_html__( 'Button Text', 'magine'),
    'description' => '',
	'section'     => $kirki_prefix . 'error',
    'default'     => esc_html__( 'Back to Home', 'magine' )
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'text',
    'settings'     => $kirki_prefix . 'error_button_link',
	'label'       => esc_html__( 'Button Link', 'magine'),
    'description' => esc_html__( 'Default link is your homepage', 'magine'),
	'section'     => $kirki_prefix . 'error',
    'default'     => ''
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'error_btn_style',
	'label'       => esc_html__( 'Button Style', 'magine'),
	'section'     => $kirki_prefix . 'error',
	'default'     => 'twocolumns',
    'choices'     => array(
		'primary' => esc_html__( 'Primary', 'magine'),
        'light' => esc_html__( 'Light', 'magine'),
        'dark' => esc_html__( 'Dark', 'magine'),
		'info' => esc_html__( 'Info', 'magine'),
        'success' => esc_html__( 'Success', 'magine'),
        'warning' => esc_html__( 'Warning', 'magine'),
        'danger' => esc_html__( 'Danger', 'magine'),
	),
));

/* Woocommerce */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'image',
	'settings'    => $kirki_prefix . 'shop_cover_img',
	'label'       => esc_html__( 'Default Shop Cover Image', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => '',
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'shop_layout',
	'label'       => esc_html__( 'Product layout', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 'twocolumns',
    'choices'     => array(
		'twocolumns' => esc_html__( 'Two Column', 'magine'),
		'threecolumns' => esc_html__( 'Three Column', 'magine'),
        'fourcolumns' => esc_html__( 'Four Column', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'product_thumbnail',
	'label'       => esc_html__( 'Product Thumbnail Size', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 'large',
    'choices'     => array(
		'large' => esc_html__( 'Large', 'magine'),
		'full' => esc_html__( 'Full', 'magine'),
        'medium' => esc_html__( 'Medium', 'magine'),
        'shop_thumbnail' => esc_html__( 'Default', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'select',
	'settings'    => $kirki_prefix . 'product_image',
	'label'       => esc_html__( 'Single Product Image Size', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 'full',
    'choices'     => array(
		'large' => esc_html__( 'Large', 'magine'),
		'full' => esc_html__( 'Full', 'magine'),
        'medium' => esc_html__( 'Medium', 'magine'),
        'shop_single' => esc_html__( 'Default', 'magine')
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'slider',
	'settings'    => $kirki_prefix . 'product_img_size',
	'label'       => esc_html__( 'Single Product Image Column Size in Percents', 'magine' ),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 50,
	'choices'     => array(
		'min'  => '30',
		'max'  => '70',
		'step' => '1',
	),
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'image',
	'settings'    => $kirki_prefix . 'woo_placeholder',
	'label'       => esc_html__( 'Placeholder Image', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => get_template_directory_uri() . '/images/woocommerce-placeholder.png',
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'remove_related',
	'label'       => esc_html__( 'Related Products', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 1
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'toggle',
	'settings'    => $kirki_prefix . 'enable_product_sharing',
	'label'       => esc_html__( 'Social Media Sharing Buttons', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 0
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'number',
	'settings'    => $kirki_prefix . 'shop_at_most',
	'label'       => esc_html__( 'Shop page show at most', 'magine'),
    'description' => esc_html__( 'Maximum number of the products.', 'magine'),
	'section'     => $kirki_prefix . 'woocommerce',
	'default'     => 8,
	'choices'     => array(
		'min'  => 1,
		'max'  => 99,
		'step' => 1,
	),
));

/* Footer */

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'textarea',
    'settings'     => $kirki_prefix . 'footermessage',
	'label'       => esc_html__( 'Credits', 'magine'),
	'section'     => $kirki_prefix . 'footer',
    'default'     => '',
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
    'type'        => 'radio',
    'settings'     => $kirki_prefix . 'footer_layout',
	'label'       => esc_html__( 'Footer Layout', 'magine'),
	'section'     => $kirki_prefix . 'footer',
    'default'     => '3',
    'choices'     => array(
        '3' => esc_html__( '3 Column', 'magine' ),
        '2' => esc_html__( '2 Column', 'magine' ),
        '3v2' => esc_html__( '3 Column (v2)', 'magine' ),
        '4' => esc_html__( '4 Column', 'magine' )
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Background Color', 'magine' ),
	'settings'    => $kirki_prefix . 'footer_bg_color',
	'section'     => $kirki_prefix . 'footer',
	'default'     => '#202c39',
    'output' => array(
		array(
			'element' => '#magine-footer',
            'property' => 'background-color',
            'exclude' => array('#202c39')
		),
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Heading Color', 'magine' ),
	'settings'    => $kirki_prefix . 'footer_heading_color',
	'section'     => $kirki_prefix . 'footer',
	'default'     => '#ffffff',
    'output' => array(
		array(
			'element' => '#magine-footer h1,#magine-footer h2,#magine-footer h3,#magine-footer h4,#magine-footer h5,#magine-footer h6,#footer-widgets .form-control,#magine-footer .custom-select',
            'property' => 'color',
            'exclude' => array('#ffffff')
		),
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Text/Link Color', 'magine' ),
	'settings'    => $kirki_prefix . 'footer_text_color',
	'section'     => $kirki_prefix . 'footer',
	'default'     => '#aaaaaa',
    'output' => array(
		array(
			'element' => '#magine-footer-bottom .magine-footer-icons li a,#magine-footer,#magine-footer p,#magine-footer a:not([class]),#footer-widgets .magine-widget a:not(.btn)',
            'property' => 'color',
            'exclude' => array('#aaaaaa')
		),
	)
));

Kirki::add_field( $kirki_prefix . 'theme_config_id', array(
	'type'        => 'color',
    'label'       => esc_html__( 'Link Hover Color', 'magine' ),
	'settings'    => $kirki_prefix . 'footer_link_color',
	'section'     => $kirki_prefix . 'footer',
	'default'     => '#ffffff',
    'output' => array(
		array(
			'element' => '#footer-widgets .tagcloud a:hover,#footer-widgets a[class^="tag"]:hover,#magine-footer-bottom .magine-footer-icons li a:hover,#magine-footer a:not([class]):hover,#footer-widgets .magine-widget a:not(.btn):hover',
            'property' => 'color',
            'exclude' => array('#ffffff')
		),
	)
));
?>