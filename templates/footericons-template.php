<?php $magine_footer_icons = get_theme_mod( 'magine_footer_icons' ); ?> 
<?php if (!empty($magine_footer_icons)) { ?>
<ul class="magine-footer-icons">
    <?php 
    foreach ($magine_footer_icons as $entry) {
    $icon = $desc = $destination = $target = '';
    if ( isset( $entry['icon'] ) ) {            
        $icon = $entry['icon'];
    } 
    if ( isset( $entry['desc'] ) ) {            
        $desc = $entry['desc'];
    }
    if ( isset( $entry['destination_url'] ) ) {            
        $destination = $entry['destination_url'];
    }
    if ( isset( $entry['link_target'] ) ) {            
        $target = $entry['link_target'];
    }    
    ?>
    <li><a href="<?php echo esc_url($destination); ?>" target="<?php echo esc_attr($target); ?>" title="<?php echo esc_attr($desc); ?>"><i class="fab fa-<?php echo esc_attr($icon); ?>"></i></a></li>
    <?php } ?>
    <li id="magine-gototop-li" title="<?php esc_attr_e('Go to Top', 'magine'); ?>"><a id="magine-gototop" href="#"><i class="fas fa-arrow-up"></i></a></li>
</ul>
<?php } ?>
<div class="clearfix"></div>    