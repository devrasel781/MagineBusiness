<?php
/* ---------------------------------------------------------
Subtitle
----------------------------------------------------------- */

function magine_subtitle_cmb2 ( $meta_boxes ) {
    $prefix = 'magine_cmb2'; // Prefix for all fields
    $meta_boxes['magine_subtitle'] = array(
        'id' => 'magine_subtitle',
        'title' => esc_html__( 'Subtitle', 'magine'),
        'object_types' => array('page'), // post type
        'context' => 'side', // normal or side
        'priority' => 'high', // default or high
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name'    => esc_html__( 'Subtitle (Optional)', 'magine'),
                'desc'    => '',
                'id'      => $prefix . '_subtitle',
                'type'    => 'text'
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'magine_subtitle_cmb2' );

/* ---------------------------------------------------------
Sidebar
----------------------------------------------------------- */

function magine_sidebar_cmb2 ( $meta_boxes ) {
    $prefix = 'magine_cmb2'; // Prefix for all fields
    $meta_boxes['magine_sidebar'] = array(
        'id' => 'magine_sidebar',
        'title' => esc_html__( 'Hide Sidebar', 'magine'),
        'object_types' => array('post'), // post type
        'context' => 'side', // normal or side
        'priority' => 'high', // default or high
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name'    => esc_html__( 'Hide Sidebar', 'magine'),
                'desc'    => '',
                'id'      => $prefix . '_sidebar',
                'type'    => 'radio_inline',
                'show_option_none' => false,
                'default'          => 'no',
                'options'          => array(
                    'yes' => esc_html__( 'Yes', 'magine'),
                    'no' => esc_html__( 'No', 'magine')
                ),
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'magine_sidebar_cmb2' );

/* ---------------------------------------------------------
Header Image
----------------------------------------------------------- */

function magine_bg_image_cmb2 ( $meta_boxes ) {
    $prefix = 'magine_cmb2'; // Prefix for all fields
    $meta_boxes['magine_bg_image'] = array(
        'id' => 'magine_bg_image',
        'title' => esc_html__( 'Header', 'magine'),
        'object_types' => array('post','page'), // post type
        'context' => 'side', // normal or side
        'priority' => 'default', // default or high
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__( 'Header Style', 'magine'),
                'desc' => esc_html__( 'You can change default header style from theme settings.', 'magine'),
                'id' => $prefix . '_header_style',
                'type' => 'select',
                'show_option_none' => false,
                'default'          => 'default',
                'options'          => array(
                    'default' => esc_html__( 'Default', 'magine' ),
                    'header' => esc_html__( 'Layout 1', 'magine' ),
                    'header2' => esc_html__( 'Layout 2', 'magine' ),
                    'header3' => esc_html__( 'Layout 3', 'magine' ),
                    'header4' => esc_html__( 'Layout 4', 'magine' )
                ),
            ),
            array(
                'name' => esc_html__( 'Header Image', 'magine'),
                'desc' => esc_html__( 'You can change default background image from theme settings.', 'magine'),
                'id' => $prefix . '_bg_image',
                'type' => 'file'
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'magine_bg_image_cmb2' );

/* ---------------------------------------------------------
Category Header Image
----------------------------------------------------------- */

function magine_cat_cover_cmb2 ( $meta_boxes ) {
    $prefix = 'magine_cmb2'; // Prefix for all fields
    $meta_boxes['magine_catcover'] = array(
        'id' => 'magine_catcover',
        'title' => esc_html__( 'Additional Fields', 'magine'),
        'object_types' => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies' => array( 'category' ), // Tells CMB2 which taxonomies should have these fields
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__( 'Header Image', 'magine'),
                'desc' => '',
                'id' => $prefix . '_cat_cover_image',
                'type' => 'file'
            ),
            array(
                'name' => esc_html__( 'Layout', 'magine'),
                'desc' => '',
                'id' => $prefix . '_cat_layout',
                'type' => 'select',
                'show_option_none' => false,
                'default'          => 'magine-two-columns',
                'options'          => array(
                    'magine-one-column' => esc_html__( 'One Column', 'magine'),
                    'magine-two-columns' => esc_html__( 'Two Column', 'magine'),
                    'magine-three-columns' => esc_html__( 'Three Column', 'magine'),
                    'magine-four-columns' => esc_html__( 'Four Column', 'magine')
                ),
            ),
            array(
                'name' => esc_html__( 'Card Style', 'magine'),
                'desc' => '',
                'id' => $prefix . '_cat_card_style',
                'type' => 'select',
                'show_option_none' => false,
                'default'          => 'masonry',
                'options'          => array(
                    'masonry' => esc_html__( 'Vertical', 'magine'),
                    'xsmasonry' => esc_html__( 'Vertical (Small)', 'magine'),
                    'post' => esc_html__( 'Horizontal', 'magine')
                ),
            ),
            array(
                'name' => esc_html__( 'Masonry Spacing', 'magine'),
                'desc' => '',
                'id' => $prefix . '_cat_masonry_spacing',
                'type' => 'select',
                'show_option_none' => false,
                'default'          => 'medium-grid',
                'options'          => array(
                    'large-grid' => esc_html__( 'Wide', 'magine'),
                    'medium-grid' => esc_html__( 'Default', 'magine'),
                    'small-grid' => esc_html__( 'Narrow', 'magine')
                ),
            ),
            array(
                'name' => esc_html__( 'Show Sidebar', 'magine'),
                'desc' => '',
                'id' => $prefix . '_cat_sidebar',
                'type' => 'radio_inline',
                'show_option_none' => false,
                'default'          => 'yes',
                'options'          => array(
                    'yes' => esc_html__( 'Yes', 'magine'),
                    'no' => esc_html__( 'No', 'magine')
                ),
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'magine_cat_cover_cmb2' );

/* ---------------------------------------------------------
Author Fields
----------------------------------------------------------- */

function magine_author_fields_cmb2 () {
    $prefix = 'magine_cmb2'; // Prefix for all fields
    $magine_cmb2 = new_cmb2_box( array(
        'id' => 'magine_author_fields',
        'title' => esc_html__( 'Additional Author Fields', 'magine'),
        'object_types' => array( 'user' ),
        'show_names' => false, // Show field names on the left
        'cmb_styles' => true
    ));
    $magine_cmb2->add_field( array(
		'name'     => esc_html__( 'Header Image', 'magine'),
		'id'       => $prefix . 'author_title',
		'type'     => 'title',
		'on_front' => true,
	) );
    $magine_cmb2->add_field( array(
        'name' => esc_html__( 'Header Image', 'magine'),
        'id' => $prefix . 'author_image',
        'type' => 'file'
    ) );
    $magine_cmb2->add_field( array(
		'name'     => esc_html__( 'Social Media Icons', 'magine'),
		'id'       => $prefix . 'social_title',
		'type'     => 'title',
		'on_front' => true,
	) );
    $magine_cmb2->add_field(
            array(
            'id' => $prefix . 'user_icons',
            'type' => 'group',
            'options' => array(
                'group_title'   => esc_html__( 'Icon {#}', 'magine' ),
                'add_button' => esc_html__( 'Add Another Icon', 'magine' ),
                'remove_button' => esc_html__( 'Remove Icon', 'magine' ),
                'sortable' => true,
                'closed'     => true,
            ),
            'fields' => array(
				array(
                    'name' => esc_html__( 'Select Icon:', 'magine'),
                    'id' => $prefix . 'iconimg',
                    'desc' => '',
                    'type' => 'select',
                    'options' => array(
                        '' => esc_html__( 'Select Icon', 'magine' ),
                        'facebook-f' => esc_html__( 'Facebook', 'magine' ),
                        'twitter' => esc_html__( 'Twitter', 'magine' ),
                        'google-plus' => esc_html__( 'Google +', 'magine' ),
                        'google' => esc_html__( 'Google', 'magine' ),
                        'linkedin' => esc_html__( 'Linkedin', 'magine' ),
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
                        'paper-plane' => esc_html__( 'Email', 'magine' ),
                    ),
                ),
                array(
                    'name' => esc_html__( 'Link:', 'magine'),
                    'desc' => esc_html__( 'Example; http://www.facebook.com', 'magine'),
                    'id' => $prefix . 'iconlink',
                    'type' => 'text_url'
                ),
            ),
        ));
}

add_action( 'cmb2_init', 'magine_author_fields_cmb2' );
?>