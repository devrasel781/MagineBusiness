<?php if ( is_active_sidebar( 'magine_slidein_sidebar' ) ) { ?>
<div id="magine-overlay"></div>
<div id="magine-panels">
    <aside id="magine-panel" class="magine-panel">
        <div class="magine-panel-inner">
            <a href="#" class="magine-panel-close"><i class="fas fa-times"></i></a>
            <?php if ( is_active_sidebar( 'magine_slidein_sidebar' ) ) { dynamic_sidebar( 'magine_slidein_sidebar' ); } ?>
        </div>
    </aside>
</div>
<?php } ?>
