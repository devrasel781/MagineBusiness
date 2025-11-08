<?php $magine_fullscreen_search = get_theme_mod( 'magine_fullscreen_search' ); ?>
<?php if ($magine_fullscreen_search) { ?>
<div id="magine-fullscreen-search">
    <div id="magine-fullscreen-search-content">
        <a href="#" id="magine-close-search"><i class="fas fa-times"></i></a>
        <?php get_template_part( 'templates/searchlg', 'template'); ?>
    </div>
</div>
<?php } ?>
