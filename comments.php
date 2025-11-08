<?php if (post_password_required()) { return; } ?>
<?php if ((have_comments()) || (comments_open())) { ?>
<div id="magine-comments-wrapper">
<?php if (have_comments()) { ?>
<?php $magine_num_comments = get_comments_number(); ?>
<div id="magine_comments_block" class="magine_comments_block">
    <h3 class="magine-title-with-border">
        <span><?php esc_html_e("Comments", 'magine'); ?></span>
    </h3>
    <div class="magine_commentlist">
        <?php wp_list_comments( array('callback' => 'magine_comment','style' => 'div') ); ?>
    </div>
    <div class="magine_comments_rss">
        <?php post_comments_feed_link('<i class="fas fa-rss-square"></i> ' . esc_html__( 'Subscribe', 'magine' )); ?>
    </div>  
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
    <div class="magine-pager comments-pager">    
            <div class="magine-pager-left">
                <?php previous_comments_link( '<i class="fas fa-chevron-left"></i> ' . esc_html__( 'Older comments', 'magine' ) ); ?>
            </div>
            <div class="magine-pager-right">
                <?php next_comments_link( esc_html__( 'Newer comments', 'magine' ) .  ' <i class="fas fa-chevron-right"></i>'); ?>
            </div>
        <div class="clearfix"></div>
        </div>
    <?php } ?>

<?php
if (!empty($comments_by_type['pings'])) {
    $magine_count = count($comments_by_type['pings']);
    ($magine_count !== 1) ? $magine_txt = esc_html__('Pings&#47;Trackbacks', 'magine') : $magine_txt = esc_html__('Pings&#47;Trackbacks', 'magine');
?>

    <h6 id="pings"><?php printf( esc_html__( '%1$d %2$s for "%3$s"', 'magine'), $magine_count, $magine_txt, get_the_title() )?></h6>

    <ol class="magine_commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>

<?php } ?>
</div>     
<?php } ?>     
<?php if (comments_open()) { ?>  
<div id="magine_comment_form" class="magine_comment_form">   
    <?php
    $comments_args = array(
        'title_reply_before'=>'<h3>',
        'title_reply_after'=>'</h3>',
        'cancel_reply_before' => '<span class="magine_cancel">',
        'cancel_reply_after' => '</span>',
        'class_submit' => 'btn btn-primary'
    );
    ?>
    <?php comment_form($comments_args); ?>
</div>    
<?php } ?>
</div>    
<?php } ?>